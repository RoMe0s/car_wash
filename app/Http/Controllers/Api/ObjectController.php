<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Service\ServiceCreateRequest;
use App\Models\ServicesObject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Api\Object\ObjectRequest;
use App\Services\ObjectService;
use Illuminate\Support\Facades\Auth;

class ObjectController extends Controller
{

    protected $objectService;

    function __construct(ObjectService $objectService) {
    
        $this->objectService = $objectService;
    
    }

    public function store(ObjectRequest $request) {
    
        $status = 'success';

        $message = trans('messages.save ok');

        $object = null;

        $user = $this->_findUser();

        try {

            $object = $this->objectService->save($request, $user->id);

        } catch(\Exception $e) {
        
            $status = 'error';

            $message = $e->getMessage();
        
        }

        return ['status' => $status, 'message' => $message, 'object' => $object, 'redirect' => isset($object) ? route('object.edit', ['id' => $object->id]) : null];
    
    }

    public function update(int $id, ObjectRequest $request) {

        $status = 'success';

        $message = trans('messages.save ok');

        $object = null;

        $user = $this->_findUser();

        try {

            $object = $this->objectService->save($request, $user->id, $id);

        } catch(\Exception $e) {
        
            $status = 'error';

            $message = $e->getMessage();
        
        }

        return ['status' => $status, 'message' => $message, 'object' => $object];
    
    }

    private function _findUser() {
    
        return Auth::user();
    
    }

    public function storeService(int $id, ServiceCreateRequest $request) {

        $status = 'success';

        $message = trans('messages.save ok');

        $html = null;

        try {

            $service = $this->objectService->storeService($id, $request);

            $html = view('object.partials.custom_item')->with(['service' => $service])->render();

        } catch (\Exception $e) {

            $status = 'error';

            $message = $e->getMessage();

        }

        return ['status' => $status, 'message' => $message, 'html' => $html];

    }

    public function removeService(int $object_id, int $service_id) {

        $status = 'success';

        $message = null;

        try {

            $this->objectService->removeService($object_id, $service_id);

        } catch (\Exception $e) {

            $message = $e->getMessage();

            $status = 'error';

        }

        return ['status' => $status, 'message' => $message, 'id' => $service_id];

    }
}
