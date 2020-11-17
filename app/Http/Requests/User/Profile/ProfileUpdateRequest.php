<?php

namespace App\Http\Requests\User\Profile;

use App\Http\Requests\Abstracts\APIFormRequest;
use App\Models\Interfaces\IBaseUserModel;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends APIFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;    //  Auth::guard(IBaseAppGuards::USER)->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        dd($this->all());
        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'exclude_if:email,|email|unique:users,email,' . $this->user()->id(),
            'phone' => 'regex:' . IBaseUserModel::REGEX_PHONE,
            'email_confirmed' => 'exclude_if:email_confirmed,|boolean',
            'active' => 'boolean',
            'location_country_id' => 'required|integer|exists:countries,id',
            'location_city_id' => 'required|integer|exists:cities,id',
            'unblock_date'  => 'nullable|date:y-m-d_h:i:s',
            'is_verified' => 'required|boolean',
            'about' => 'nullable|string|max:1000'
        ];
    }
}
