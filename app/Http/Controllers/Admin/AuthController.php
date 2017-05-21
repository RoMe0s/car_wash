<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AuthController extends AdminController
{

    public function index() {

        return $this->render('auth.login');

    }

}
