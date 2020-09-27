<?php

namespace App\Exceptions;

use Exception;

class ApplicationException extends Exception {
    protected $message = "Something went wrong!";
}