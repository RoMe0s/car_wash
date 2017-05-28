<?php

namespace App\Services;

use App\Models\Object as ObjectModel;
use DB;
use Exception;
use App\Models\Schedule;
use App\Services\FileService;
use App\Http\Requests\Api\Object\ObjectRequest;
use App\Models\ServicesObject;
use App\Models\Service;

class ObjectService {

    /**
     * @param ObjectRequest $request
     * @param int $user_id
     * @param int|null $object_id
     * @return null|ObjectModel
     * @throws Exception
     */
    public function save(ObjectRequest $request, int $user_id, int $object_id = null) {

        DB::beginTransaction();

        $object = $object_id !== NULL ? $this->find($object_id) : new ObjectModel();

        try {

            $object->fill($request->all());

            $object->save();
                
            if($request->hasFile('image')) {

                $object->update([
                    'image' => FileService::move($request->file('image'), 'objects/' . $object->id)
                ]);
            
            }

            $this->_processUsers($object, $user_id);

            $this->_processServices($object, $request);

            $this->_processSchedule($object, $request);

            DB::commit();

       } catch(Exception $e) {

            DB::rollback();

            throw new Exception(trans('messages.save bad'));

        }

        return $object;
    
    }

    /**
     * @param ObjectModel $object
     * @param int|array $users
     */
    public function _processUsers(ObjectModel $object, $users) {

        $isset_ids = $object->users->pluck('id')->toArray();

        $users = is_array($users) ? $users : [$users];

        $new_users = array_diff($users, $isset_ids);

        if(sizeof($new_users)) {
    
            $object->users()->attach($new_users);

        }
    
    }

    /**
     * @param ObjectModel $object
     * @param $request
     */
    public function _processServices(ObjectModel $object, $request) {
    
        $services = $request->get('services', []);

        $basic = isset($services['basic']) ? $services['basic'] : [];

        $additional = isset($services['additional']) ? $services['additional'] : [];

        $custom = isset($services['custom']) ? $services['custom'] : [];

        foreach($basic as $id => $values) {

            foreach($values as $class => $price) {
                
                $object->services()->where('type', 'basic')->where('services.id', $id)->wherePivot('class', $class)->update(['services_objects.price' => $price]);
            
            }
        
        }

        foreach($additional as $id => $price) {
        
            $object->services()->where('type', 'additional')->where('services.id', $id)->updateExistingPivot($id, ['price' => $price]);        
        }

        foreach($custom as $id => $values) {

            $name = $values['name'];

            unset($values['name']);

            foreach($values as $class => $price) {

                $object->services()->where('type', 'custom')->where('services.id', $id)->wherePivot('class', $class)->update([
                    'services_objects.price' => $price,
                    'services.name' => $name
                ]);

            }

        }

    }

    public function _processSchedule(ObjectModel $object, $request) {

        $schedules = $request->get('schedule', []);

        if(!sizeof($schedules)) {

            $object->schedules()->delete();

            return;
        
        }

        $isset_schedules = collect();

        foreach(range(1,7) as $day) {

            $times = $object->schedules->where('day', $day)->pluck('time');
        
            $isset_schedules->put($day, $times);
        
        }

        foreach($schedules as $day => $times) {

            $times = array_keys($times);
                
            $delete = $isset_schedules[$day]->diff($times);

            $object->schedules()->whereIn('time', $delete)->delete();

            $new = array_diff($times, $isset_schedules[$day]->toArray());
        
            foreach($new as $time) {
            
                $schedule = new Schedule();

                $schedule->fill([
                    'day' => $day,
                    'time' => $time
                ]); 

                $object->schedules()->save($schedule);
            
            }
        
        }
    
    }

    public function find(int $id) {
    
        return ObjectModel::with(['services', 'users', 'schedules'])->find($id);
    
    }

    /**
     * @param int $id
     * @param $request
     * @return Service
     * @throws Exception
     */
    public function storeService(int $id, $request)
    {

        DB::beginTransaction();

        try {

            $service = new Service([
                'name' => $request->get('name', null),
                'type' => 'custom'
            ]);

            $service->save();

            $object = ObjectModel::find($id);

            foreach ($request->get('price', []) as $class => $price) {

                $service->objects()->save($object, ['price' => $price, 'class' => $class]);

            }

            DB::commit();

            return $service;

        } catch (\Exception $e) {



            throw new Exception($e->getMessage());

        }

    }

    public function removeService(int $object_id, int $service_id) {

        $element = ServicesObject::where('object_id', $object_id)->where('service_id', $service_id)->get();

        if(!sizeof($element)) {

            throw new Exception(trans('messages.not found'));

        }

        ServicesObject::whereIn('id', $element->pluck('id')->toArray())->delete();

    }

}
