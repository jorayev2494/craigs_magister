<?php

namespace App\Policies;

use App\Models\Announcements\Base\Announcement;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AnnouncementPolicy
{
    use HandlesAuthorization;

    /**
    * @var Model $authModel
    */
    private Model $authModel;

    public function __construct() {
        $this->authModel = Auth::guard(IBaseAppGuards::USER)->user() ?? Auth::guard(IBaseAppGuards::ADMIN)->user();
    }

    /**
     * Determine whether the model can view any models.
     *
     * @param  \App\Models\Model  $model
     * @return mixed
     */
    public function viewAny(Model $model): bool
    {
        return  $model->id == $this->authModel->id;
    }

    /**
     * Determine whether the model can view the model.
     *
     * @param  \App\Models\Model  $model
     * @param  \App\Models\Models\Announcements\Base\Announcement  $announcement
     * @return mixed
     */
    public function view(Model $model, Announcement $announcement): bool
    {
        return  $model->id == $announcement->creator_id &&
                $model->announcements->contains($announcement->id);
    }

    /**
     * Determine whether the model can create models.
     *
     * @param  \App\Models\Model  $model
     * @return mixed
     */
    public function create(Model $model)
    {
        return  $model->id == $this->authModel->id;
    }

    /**
     * Determine whether the model can update the model.
     *
     * @param  \App\Models\Model  $model
     * @param  \App\Models\Models\Announcements\Base\Announcement  $announcement
     * @return mixed
     */
    public function update(Model $model, Announcement $announcement)
    {
        return  $model->id == $announcement->creator_id &&
                $model->announcements->contains($announcement->id);
    }

    /**
     * Determine whether the model can delete the model.
     *
     * @param  \App\Models\Model  $model
     * @param  \App\Models\Models\Announcements\Base\Announcement  $announcement
     * @return mixed
     */
    public function delete(Model $model, Announcement $announcement)
    {
        return  $model->id == $announcement->creator_id &&
                $model->announcements->contains($announcement->id);
    }

    /**
     * Determine whether the model can restore the model.
     *
     * @param  \App\Models\Model  $model
     * @param  \App\Models\Models\Announcements\Base\Announcement  $announcement
     * @return mixed
     */
    public function restore(Model $model, Announcement $announcement)
    {
        dd(__METHOD__);
    }

    /**
     * Determine whether the model can permanently delete the model.
     *
     * @param  \App\Models\Model  $model
     * @param  \App\Models\Models\Announcements\Base\Announcement  $announcement
     * @return mixed
     */
    public function forceDelete(Model $model, Announcement $announcement)
    {
        dd(__METHOD__);
    }
}
