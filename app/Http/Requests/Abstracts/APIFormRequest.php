<?php

namespace App\Http\Requests\Abstracts;

use App\Http\Requests\Traits\ApiHelpersTrait;
use App\Traits\ErrorFormatResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

abstract class APIFormRequest extends FormRequest
{
    use ErrorFormatResponse;
    use ApiHelpersTrait;

    /**
     * @var bool
     */
    private bool $oneMessage = false;

    /**
     * Set variable for getting one message in response
     */
    protected function returnOneMessage() : void
    {
        $this->oneMessage = true;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize() : bool;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules() : array;

    /**
     * Handle errors in validation
     *
     * @param Validator $validator
     * @return void
     */
    public function failedValidation(Validator $validator) : void 
    {
        $errors = null;
        
        if ($this->oneMessage) {
            $errors = $validator->errors()->first();            
        } else {
            $errors = $validator->errors();
        }

        throw new HttpResponseException(response($this->errorResponse($errors->toArray()), Response::HTTP_BAD_REQUEST));

    }
}
