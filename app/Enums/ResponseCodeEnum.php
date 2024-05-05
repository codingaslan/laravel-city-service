<?php

namespace App\Enums;

use Ramsey\Uuid\Type\Integer;

enum ResponseCodeEnum: Integer
{
    case OK = 200;
    case Created = 201;
    case Accepted = 202;
    case Forbidden = 403;

    // Auth errors
    case Unauthorized = 401;

    // validations errors


    // General Errors
    case Not_Found = 404;
    case Internal_Server_Error = 500;
    case Non_Authoritative_Information = 203;
    case No_Content = 204;
    case    Bad_Request = 400;
    case Method_Not_Allowed = 405;
    case Not_Acceptable = 406;
    case Not_Implemented = 501;
}

