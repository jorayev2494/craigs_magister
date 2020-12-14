<?php

namespace App\Http\Controllers\Debug;

use App\Events\Broadcast\Debug\TestEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebSocketController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('web_socket');
    }

    public function auth(Request $request)
    {
        dd($request->all());
    }

    public function test(string $ws_text = 'ws successful working!'): JsonResponse
    {
        // TestEvent::broadcast('text');
        // dd('awd');
        TestEvent::dispatch($ws_text); 
        return response()->json('success');
    }
}
