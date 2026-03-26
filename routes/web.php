<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\TwilioWebhookController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [AgentController::class, 'index']);
Route::post('/agents', [AgentController::class, 'store']);
Route::post('/make-call', [CallController::class, 'makeCall']);
Route::post('/twilio/webhook', [TwilioWebhookController::class, 'handle'])->name('twilio.webhook');
