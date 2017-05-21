<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Auth\ApiLoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{

    protected $authService;

    function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(ApiLoginRequest $request) {

        return ['status' => 'success', 'user' => $this->authService->login($request), 'redirect' => route('admin')];

    }

    public function logout() {

        $this->authService->logout();

        return ['status' => 'success', 'redirect' => route('admin.login')];

    }

}
