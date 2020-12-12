<?php

namespace App\Http\Controllers\User;

use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewStoreRequest;
use App\Http\Resources\ReviewResource;
use App\Services\AnnouncementReviewService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    /**
    * @var string $type
    */
    private string $type;

    /**
    * @var AnnouncementReviewService $announcementReviewService
    */
    private AnnouncementReviewService $announcementReviewService;

    public function __construct(AnnouncementReviewService $announcementReviewService) {
        $this->middleware('auth:' . IBaseAppGuards::USER);
        $this->announcementReviewService = $announcementReviewService;
    }

    public function __invoke(ReviewStoreRequest $request, int $id): JsonResponse
    {

        $this->type = $request->query('type');

        // if (Gate::allows('review-store', [$this->type, $id])) {
        //     throw new BadRequestException('you dont have store review');
        // }

        switch ($this->type) {
            case 'announcement':
                $result = $this->announcementReviewService->storeReview($id, $request->validated());
                break;
            
            default:
                # code...
                break;
        }

        return response()->json(ReviewResource::make($result));
    }
}
