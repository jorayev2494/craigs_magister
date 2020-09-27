<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Throwable;

class AlreadyCreatedException extends ApplicationException 
{
    protected $message = '%s is already created';
    protected  $code = Response::HTTP_BAD_REQUEST;
    
    public function __construct(string $message = '', int $code = 0, Throwable $previous = null) {
        if (!$message) {
            $message = 'Data';
        }

        $message = sprintf($this->message, $message);

        if ($code === 0) {
            $code = $this->code;
        }

        parent::__construct($message, $code, $previous);
    }
}
