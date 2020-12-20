<?php

namespace App\Policies\Gates;

use App\Models\User;
use Illuminate\Support\Str;

class ReviewAccessGate
{
    public function store(User $user, string $type, int $id): bool
    {
        // dd($user->attributesToArray(), $type, $id);
        // For User Announcement
        if ($type == 'announcement') {
            return $user->announcements->contains($id);
        }

        // For User Review
        if ($type == 'user') {
            return $user->id == $id;
        }

        return false;
    }
}
