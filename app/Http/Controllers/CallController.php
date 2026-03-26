<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Call;
use App\Services\TwilioService;
use App\Services\VapiService;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function makeCall(Request $request, TwilioService $twilio, VapiService $vapi)
    {
        $agent = Agent::findOrFail($request->agent_id);

        // 1️⃣ Start Twilio call
//        $callSid = $twilio->makeCall($request->phone, route('twilio.webhook'));
        $callSid = $twilio->makeCall($request->phone, env('TWILIO_WEBHOOK_URL'));

        // 2️⃣ Optional: trigger VAPI AI agent call
        $vapiResponse = $vapi->makeCall($agent->vapi_assistant_id, $request->phone);

        // 3️⃣ Save in DB
        $call = Call::create([
            'agent_id' => $agent->id,
            'to_number' => $request->phone,
            'call_sid' => $callSid,
            'vapi_call_id' => $vapiResponse['id'] ?? null,
            'status' => 'initiated'
        ]);

        return response()->json($call);
    }
}
