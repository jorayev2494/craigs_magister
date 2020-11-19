<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AdminService;
use App\Http\Controllers\Controller;

/**
 * Class EmailConfirmationController
 */
class EmailConfirmationController extends Controller
{

    /**
     * @var AdminService $adminService
     */
    private AdminService $adminService;
    
    public function __construct(AdminService $adminService) {
        $this->adminService = $adminService;
        $this->middleware('throttle:60,1')->only('__invoke');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) : Response
    {
        $request->validate(['token' => 'required|size:' . Admin::CONFIRM_TOKEN]);

        $this->adminService->confirmEmail($request->get('token', null));
        
        return response()->noContent(Response::HTTP_ACCEPTED);        
    }
}
