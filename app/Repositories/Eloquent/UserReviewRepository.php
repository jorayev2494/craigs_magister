<?php

namespace App\Repositories\Eloquent;

use App\Models\UserReview;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;

class UserReviewRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return UserReview::class;
    }
}
