<?php


namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public $message = 'model not found';
    
}
