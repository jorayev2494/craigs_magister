<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Error Format Response
 */
trait ErrorFormatResponse
{
    protected function errorResponse($errors = null) : array
    {
        $errors = $this->formatErrors($errors);
        
        return is_string($errors) ? ['errors' => [$errors]] : ['errors' => $errors];
    }

    private function formatErrors($errors)
    {
        if (is_string($errors)) {
            return $this->formatMessage($errors);
        } else if (is_array($errors)) {
            foreach ($errors as $key => $error) {
                if (is_array($error)) {
                    $errors[$key] = $this->formatErrors($error);
                } else {
                    $errors[$key] = $this->formatMessage($error);
                }
            }
            return $errors;
        } else {
            return $errors;
        }
    }

    private function formatMessage(string $message) : string
    {
        $message = str_replace('.', '', $message);
        return Str::snake(strtolower($message));
    }
    
}
