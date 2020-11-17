<?php

namespace App\Http\Requests\Admin\Management\User;

use App\Http\Requests\Abstracts\APIFormRequest;
use App\Models\Interfaces\IBaseModel;
use App\Models\Interfaces\IBaseUserModel;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends APIFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::guard(IBaseAppGuards::ADMIN)->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        // dd($this->all());
        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'exclude_if:email,|email|unique:users,email,' . $this->user,
            'phone' => 'regex:' . IBaseUserModel::REGEX_PHONE,
            'email_confirmed' => 'exclude_if:email_confirmed,|boolean',
            'active' => 'boolean',
            'location_country_id' => 'nullable|integer|exists:countries,id',
            'location_city_id' => 'nullable|integer|exists:cities,id',
            'unblock_date'  => 'nullable|date:y-m-d h:i:s',
            'is_verified' => 'required|boolean',
            'about' => 'nullable|string|max:1000'
        ];
    }
}
