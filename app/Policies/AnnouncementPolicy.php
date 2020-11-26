<?php

namespace App\Policies;

use App\Models\Announcements\Base\Announcement;
use App\Models\User;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AnnouncementPolicy
{
    use HandlesAuthorization;

    /**
    * @var User $authUser
    */
    private User $authUser;

    public function __construct() {
        $this->authUser = Auth::guard(IBaseAppGuards::USER)->user();
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user): bool
    {
        return  $user->id == $this->authUser->id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Models\Announcements\Base\Announcement  $announcement
     * @return mixed
     */
    public function view(User $user, Announcement $announcement): bool
    {
        return  $user->id == $announcement->creator_id &&
                $user->announcements->contains($announcement->id);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return  $user->id == $this->authUser->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Models\Announcements\Base\Announcement  $announcement
     * @return mixed
     */
    public function update(User $user, Announcement $announcement)
    {
        return  $user->id == $announcement->creator_id &&
                $user->announcements->contains($announcement->id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Models\Announcements\Base\Announcement  $announcement
     * @return mixed
     */
    public function delete(User $user, Announcement $announcement)
    {
        return  $user->id == $announcement->creator_id &&
                $user->announcements->contains($announcement->id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Models\Announcements\Base\Announcement  $announcement
     * @return mixed
     */
    public function restore(User $user, Announcement $announcement)
    {
        dd(__METHOD__);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Models\Announcements\Base\Announcement  $announcement
     * @return mixed
     */
    public function forceDelete(User $user, Announcement $announcement)
    {
        dd(__METHOD__);
    }
}
