<?php

namespace App\Http\Requests\Admin\Management\Announcements;

use App\Http\Requests\Abstracts\APIFormRequest;
use App\Models\Announcements\Base\Announcement;
use App\Models\Interfaces\IBaseModel;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AnnouncementManagementChangeStatusRequest extends APIFormRequest
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
            'status' => 'required|string|in:' . implode(',', Announcement::STATUSES),
            'status_cancelled_description' => 'nullable|required_if:status,' . Announcement::STATUS_CANCELLED . '|exclude_unless:status,' . Announcement::STATUS_CANCELLED . '|string',
            'status_blocked_description' => 'nullable|required_if:status,' . Announcement::STATUS_BLOCKED . '|exclude_unless:status,' . Announcement::STATUS_BLOCKED . '|string',
            'unblock_date' => 'nullable|required_if:status,' . Announcement::STATUS_BLOCKED . '|exclude_unless:status,' . Announcement::STATUS_BLOCKED . '|date|after:now|date_format:' . IBaseModel::FORMAT_VALIDATE,
        ];
    }
}
