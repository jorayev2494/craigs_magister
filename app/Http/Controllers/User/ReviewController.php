<?php

namespace App\Http\Controllers\User;

use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewStoreRequest;
use App\Http\Resources\ReviewResource;
use App\Models\User;
use App\Services\AnnouncementReviewService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use App\Services\User\UserReviewService;
use App\Traits\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{

    use Pagination;

    /**
    * @var string $type
    */
    private string $type;

    /**
    * @var User $authUser
    */
    private ?User $authUser;

    public function __construct() {
        $this->middleware('auth:' . IBaseAppGuards::USER);
        $this->authUser = Auth::guard(IBaseAppGuards::USER)->user();
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

    public function getByType(Request $request): JsonResponse
    {

        $request->validate([
            'type' => 'required|string|in:' . implode(',', ['announcement', 'my', 'my-recorded-review'])
        ]);

        $this->resolvePaginate($request);

        switch ($request->query('type')) {
            case 'announcement':
                $result = resolve(AnnouncementReviewService::class)->getAnnouncementReviewsByAuthor($this->authUser);
                break;
            case 'my':
                $result = resolve(UserReviewService::class)->getMyReviews($this->authUser);            
                break;
            case 'my-recorded-review':
                $result = resolve(UserReviewService::class)->getMyRecordedReviews($this->authUser);            
                break;
            default:
                # code...
                break;
        }

        $resultPagination = $this->getDataForResponse(ReviewResource::collection($result));

        return response()->json($resultPagination);
    }
}
