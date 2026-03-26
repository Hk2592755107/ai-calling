<?php
namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function makeCall($toNumber, $webhookUrl)
    {
        $call = $this->twilio->calls->create(
            $toNumber,
            env('TWILIO_NUMBER'),
            ["url" => $webhookUrl]
        );

        return $call->sid;
    }
}
