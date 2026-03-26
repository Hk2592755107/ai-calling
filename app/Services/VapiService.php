<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class VapiService
{
    public function makeCall($assistantId, $phoneNumber)
    {
        $response = Http::withToken(env('VAPI_API_KEY'))
            ->post('https://api.vapi.ai/call', [
                "assistantId" => $assistantId,
                "phoneNumber" => $phoneNumber
            ]);

        return $response->json();
    }
}
