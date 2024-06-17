<?php

namespace App\Enums;

enum ResponseMessageEnum: string
{
    case success = 'Success. ';
    case general_error = "Something went wrong!. ";
    case create_success = ":attribute Created Successfully. ";
}
