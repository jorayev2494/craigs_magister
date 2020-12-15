<?php

namespace App\Http\Requests\Admin\Management\Announcements\Category;

use App\Http\Requests\Abstracts\APIFormRequest;
use App\Models\Interfaces\IBaseModel;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryUpdateRequest extends APIFormRequest
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
        return [
            'slug' => "required|unique:categories,slug,{$this->category},id",
            'model' => "required|unique:categories,model,{$this->category},id",
            'unblock_date' => 'nullable|date|date_format:' . IBaseModel::FORMAT_VALIDATE . '|after:now'
        ];
    }
}