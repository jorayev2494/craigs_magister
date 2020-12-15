<?php

namespace App\Http\Controllers\User;

use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewStoreRequest;
use App\Http\Resources\ReviewResource;
use App\Services\AnnouncementReviewService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use App\Services\User\UserReviewService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    /**
    * @var string $type
    */
    private string $type;

    public function __construct() {
        $this->middleware('auth:' . IBaseAppGuards::USER);
    }

    public function __invoke(ReviewStoreRequest $request, int $id): JsonResponse
    {

        $this->type = $request->query('type');

        if (Gate::allows('review-store', [$this->type, $id])) {
            throw new BadRequestException('you dont have store review');
        }

        switch ($this->type) {
            case 'announcement':
                $result = resolve(AnnouncementReviewService::class)->storeReview($id, $request->validated());
                break;
            case 'user':
                $result = resolve(UserReviewService::class)->storeReview($id, $request->validated());
                break;
            
            default:
                # code...
                break;
        }

        return response()->json(ReviewResource::make($result));
    }
}
