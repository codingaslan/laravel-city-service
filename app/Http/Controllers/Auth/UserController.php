<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Traits\GeneralTraits;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;
use Illuminate\Support\Facades\Exceptions;

class UserController extends Controller
{
    use GeneralTraits;

    public function create(CreateUserRequest $request)
    {
        try {

        }catch (\Exception $e){
            return $this->returnError($e->getMessage(),$e->getCode());
        }
    }
}
