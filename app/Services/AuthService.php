<?php
/**
 * Created by PhpStorm.
 * User: rome0s
 * Date: 21.05.17
 * Time: 21:53
 */
namespace App\Services;


use App\Http\Requests\Api\Auth\ApiLoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    protected $username = 'phone';

    public function login(ApiLoginRequest $request) {

        $credentials = [
            $this->username => $request->get($this->username, null),
            'password' => $request->get('password', null)
        ];

        if(Auth::attempt($credentials) === TRUE) {

            return Auth::user();

        }

        throw new \Exception(trans('messages.user not found'));

    }

    public function logout() {

        //delete token in future

        Auth::logout();

    }

}