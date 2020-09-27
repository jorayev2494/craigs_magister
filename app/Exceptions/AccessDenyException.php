<?php

namespace App\Exceptions;

use Exception;

class AccessDenyException extends Exception
{
    public $message = 'User doe\'s not have permissions';
}
