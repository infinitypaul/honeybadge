<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NotificationRequest $request)
    {
        if (method_exists($this, $handler = 'handle'.$request->Type)) {
            return $this->{$handler}($request->all());
        }
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * @param array $request
     * @return JsonResponse
     */
    protected function handleSpamNotification(array $request){
        Log::channel('slack')->info(print_r($request, true));
        return response()->json([
           'message' => 'Alert Sent To The Slack Channel'
        ]);
    }
}
