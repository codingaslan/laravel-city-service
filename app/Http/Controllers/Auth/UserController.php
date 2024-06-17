<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Traits\GeneralTraits;
use http\Client\Curl\User;

class UserController extends Controller
{
    use GeneralTraits;

    public function create(CreateUserRequest $request)
    {
        try {
            $data = $request->getData();
            $user = User::create($data);
            $token = $user->createToken('user:user')->plainTextToken;
            $user["token"] = $token;
            return $this->returnData('user', $user);

        } catch (\Exception $e) {
            return $this->returnError($e->getMessage(), $e->getCode());
        }
    }
}
