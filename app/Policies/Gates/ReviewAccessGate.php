<?php

namespace App\Policies\Gates;

use App\Models\User;
use Illuminate\Support\Str;

class ReviewAccessGate
{
    public function store(User $user, string $type, int $id): bool
    {
        // For User Announcement
        if ($type == 'announcement') {
            $popularType = Str::plural($type, 2);
            $announcements = $user->$popularType;

            if ($announcements)
                return $announcements->contains($id);
        }

        // For User Review
        if ($type == 'user') {
            return $user->id == $id;
        }

        return false;
    }
}
