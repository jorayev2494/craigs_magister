<?php

namespace App\Http\Requests\Admin\Blog;

use App\Http\Requests\Abstracts\APIFormRequest;
use App\Models\Blog;
use App\Models\Interfaces\IBaseModel;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BlogUpdateRequest extends APIFormRequest
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
            'title' => 'required|string|max:255',
            'media_content' => 'nullable|file|mimetypes:' . implode(',', Blog::MEDIA_CONTENT_MIMETYPES),
            'category_id' => 'required|integer|exists:blog_categories,id',
            'description' => 'required|string|max:1000',
            'status' => 'required|in:' . implode(',', Blog::STATUSES),
            'blocked_description' => 'required_if:status,' . Blog::STATUS_BLOCKED,
            'publish' => 'exclude_if:publish,null|after:now|date_format:' . IBaseModel::FORMAT_VALIDATE
        ];
    }
}
