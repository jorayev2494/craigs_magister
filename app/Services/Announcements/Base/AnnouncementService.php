<?php

namespace App\Services\Announcements\Base;

use App\Exceptions\BadRequestException;
use App\Models\Announcements\Base\Announcement;
use App\Models\Announcements\Base\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Repositories\Eloquent\AnnouncementRepository;
use App\Services\Base\Abstracts\BaseModelService;
use App\Services\CategoryService;
use App\Services\CityService;
use App\Services\CountryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use FileService;
use Illuminate\Support\Arr;

class AnnouncementService extends BaseModelService
{

    /**
    * @var AnnouncementRepository $announcementEloquentRepository
    */
    public AnnouncementRepository $announcementEloquentRepository;

    /**
    * @var CategoryService $categoryService
    */
    private CategoryService $categoryService;

    /**
    * @var CountryService $countryService
    */
    private CountryService $countryService;

    /**
    * @var CityService $cityService
    */
    private CityService $cityService;

    public function __construct(
        AnnouncementRepository $announcementEloquentRepository,
        CategoryService $categoryService,
        CountryService $countryService,
        CityService $cityService
    ) {
        $this->announcementEloquentRepository = $announcementEloquentRepository;
        $this->categoryService = $categoryService;
        $this->countryService = $countryService;
        $this->cityService = $cityService;
    }

    public function getByRequestQuerySort(): Collection
    {
        $result = $this->getInstancePipeline()
            ->send($this->announcementRepository->getModelClone()->newQuery())
            ->through(
                \App\Pipelines\Database\QueryFilters\Sort::class
            )
            ->thenReturn()
            ->get();

        return $result;
    }

    public function create(User $creatorUser, array $data): void
    {
        /**
         * @var Category $foundCategory
         */
        $foundCategory = $this->categoryService->categoryEloquentRepository->find($data['category_id']);

        /**
         * @var Country $foundCountry
         */
        $foundCountry = $this->countryService->countryEloquentRepository->find($data['country_id']);

        /**
         * @var City $foundCity
         */
        $foundCity = $this->cityService->cityEloquentRepository->find($data['city_id']);

        try {
            DB::beginTransaction();

            $makeAnnouncementCategory = $foundCategory->announcements()->make(Arr::except($data, 'images'));
            $this->uploadImages($makeAnnouncementCategory, $data);

            $makeAnnouncementCategory->setImagesAttribute($data['images']);
            $makeAnnouncementCountry = $foundCountry->announcements()->make($makeAnnouncementCategory->attributesToArray());
            $makeAnnouncementCity = $foundCity->announcements()->make($makeAnnouncementCountry->attributesToArray());

            $createdAnnouncement = $creatorUser->announcements()->create(
                array_merge($makeAnnouncementCity->attributesToArray(), [
                    'status' => $this->announcementEloquentRepository->model::STATUS_WAITING,
                ])
            );

            $createdAnnouncement->concrete()->create($data[$this->announcementEloquentRepository->model::CONCRETE_PREFIX]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new BadRequestException($th->getMessage());
        }

        DB::commit();
    }

    public function update(User $authorUser, int $id, array $data): void
    {
        $foundAnnouncements = $authorUser->announcements()->findOrFail($id);

        try {
            DB::beginTransaction();
            
            $this->updateImages($foundAnnouncements, $data);

            $foundAnnouncements->update(
                array_merge($data, 
                            [
                                'status' => $this->announcementEloquentRepository->model::STATUS_WAITING
                            ]
                )
            );
            
            $foundAnnouncements->concrete->update(
                $data[$this->announcementEloquentRepository->model::CONCRETE_PREFIX]
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new BadRequestException($th->getMessage());
        }

        DB::commit();
    }

    public function findAuthorAnnouncement(User $authorUser, int $id): Model
    {
        return $authorUser->announcements()->findOrFail($id);
    }

    public function showAuthorAnnouncement(User $authorUser, int $id): Model
    {
        return $authorUser->announcements()->findOrFail($id);
    }

    public function destroyByAuthorAnnouncement(User $authorUser, int $id): bool
    {
        $foundAnnouncements = $authorUser->announcements()->findOrFail($id);
        return $this->destroyAnnouncement($foundAnnouncements);
    }

    private function destroyAnnouncement(Announcement $announcement): bool
    {
        $this->deleteImages($announcement);
        return $announcement->delete();
    }

    private function deleteImages(Announcement $deleteAnnouncement): void
    {
        foreach ($deleteAnnouncement->images as $image) {
            FileService::deleteFile($deleteAnnouncement->getImagePath(), $image);
        }
    }

    private function updateImages(Announcement $updateAnnouncement, array &$data): void
    {
        if (array_key_exists('images', $data)) {
            foreach ($updateAnnouncement->images as $image) {
                FileService::deleteFile($updateAnnouncement->getImagePath(), $image);
            }

            foreach ($data['images'] as $key => &$image) {
                if (!is_file($image)) return;
                $data['images'][$key] = FileService::uploadFile($updateAnnouncement->getImagePath(), $image);
            }
        }
    }

    private function uploadImages(Announcement $makeAnnouncementCategory, array &$data): void
    {
        if (array_key_exists('images', $data)) {
            foreach ($data['images'] as $key => &$image) {
                $data['images'][$key] = FileService::uploadFile($makeAnnouncementCategory->getImagePath(), $image);
            }
        }
    }
}
