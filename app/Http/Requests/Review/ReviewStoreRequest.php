<?php

namespace App\Http\Requests\Review;

use App\Http\Requests\Abstracts\APIFormRequest;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReviewStoreRequest extends APIFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::guard(IBaseAppGuards::USER)->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:' . implode(',', ['announcement']),
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string|min:2|max:1000',
        ];
    }
}
