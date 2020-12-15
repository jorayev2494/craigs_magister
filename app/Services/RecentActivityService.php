<?php

namespace App\Services;

use App\Models\Admin;
use App\Repositories\Eloquent\RecentActivityRepository;
use App\Services\Base\Abstracts\BaseModelService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class RecentActivityService extends BaseModelService
{
    /**
    * @var RecentActivityRepository $recentActivityEloquentRepository
    */
    public RecentActivityRepository $recentActivityEloquentRepository;

    public function __construct(RecentActivityRepository $recentActivityEloquentRepository) {
        $this->recentActivityEloquentRepository = $recentActivityEloquentRepository;
    }


    public function updateOrCreate(array $data, array $values = []): Model
    {
        return $this->recentActivityEloquentRepository->updateOrCreate(
            $data,
            $this->getClearData($values),
        );
    }

    private function getClearData(array $data): array
    {
        $exceptFilles = ['updated_at'];
        return Arr::except($data, $exceptFilles);
    }

}
