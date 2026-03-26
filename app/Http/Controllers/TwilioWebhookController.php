<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;
use Twilio\TwiML\VoiceResponse;

class TwilioWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $callSid = $request->input('CallSid');
        $status = $request->input('CallStatus');

        $call = Call::where('call_sid', $callSid)->first();
        if($call) {
            $call->update(['status' => $status]);
        }

        $response = new VoiceResponse();
        $response->say("Connecting to AI agent...");

        return response($response)->header('Content-Type', 'text/xml');
    }
}

