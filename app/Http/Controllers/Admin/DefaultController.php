<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class DefaultController extends AdminController
{

    public function index() {

        return $this->render('home');

    }

}
