<?php

namespace App\Services\Admin\Management;

use App\Services\Announcements\Base\AnnouncementService;

class AnnouncementManagementService extends AnnouncementService
{
    public function changeStatus(int $id, array $data): void
    {
        // dd($data);
        $foundAnnouncement = $this->announcementEloquentRepository->find($id);

        // $this->adminChangeStatus($data);
        // dd($data);

        // if: status == blocked
        if ($data['status'] == $this->announcementEloquentRepository->model::STATUS_BLOCKED) {
            $data = array_merge($data, [
                'status_cancelled_description' => null,
            ]);
        }

        // if: status == cancelled
        if ($data['status'] == $this->announcementEloquentRepository->model::STATUS_CANCELLED) {
            $data = array_merge($data, [
                'status_blocked_description' => null,
                'unblock_date' => null,
            ]);
        }

        // if: status == !STATUS_CANCELS Positive statuses
        if (!in_array($data['status'], $this->announcementEloquentRepository->model::STATUS_CANCELS)) {
            $data = array_merge($data, [
                'status_cancelled_description' => null,
                'status_blocked_description' => null,
                'unblock_date' => null,
            ]);
        }

        $foundAnnouncement->update($data);
    }
}
