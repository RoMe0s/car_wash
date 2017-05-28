<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Services\ObjectService;
use App\Models\Service;

class ObjectController extends AdminController
{

    protected $objectService;

    function __construct(ObjectService $objectService) {

        parent::__construct();
    
        $this->objectService = $objectService; 
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $object = $this->objectService->find($id);

        abort_if(!$object, 404);

        $services = array();

        $object->services->each(function($item) use (&$services) {

            $selector = $item->type != "custom" ? $item->name : $item->id;

            $services[$item->type][$selector][$item->pivot->class] = $item;
        
        });

        $this->data('services', $services);

        $this->data('model', $object);

        return $this->render('object.edit');

    }
}
