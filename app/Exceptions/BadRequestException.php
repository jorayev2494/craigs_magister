<?php

namespace App\Exceptions;

use Exception;

class BadRequestException extends Exception
{
    public $message = 'Invalid credentials';
}
