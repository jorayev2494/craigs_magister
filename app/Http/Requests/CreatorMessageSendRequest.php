<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatorMessageSendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:' . implode(',', ['announcement', 'creator']),
            'creator_id' => 'required|integer|exists:users,id',
            'your_name' => 'required|string',
            'your_phone' => 'required|numeric',
            'your_email' => 'required|email',
            'your_description' => 'required|string'
        ];
    }
}
