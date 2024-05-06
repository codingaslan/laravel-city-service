<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Traits\GeneralTraits;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;
use Illuminate\Support\Facades\Exceptions;

class UserController extends Controller
{
    use GeneralTraits;

    public function create(CreateUserRequest $request)
    {
        try {
            $data = $request->only('f_name', 'l_name', 'email', 'phone', 'password');
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
            $user['token'] = $user->createToken('city_service', ['user'])->plainTextToken;
            return $this->returnData('user', $user, 'User Created Successfully');

        } catch (\Exception $e) {
            return $this->returnError($e->getMessage(), $e->getCode());
        }
    }
}
