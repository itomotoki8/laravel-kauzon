<?php

namespace App\Http\Controllers;
use Laravel\Casher\Http\Controllers\WebhookController as CashierController;
use Illuminate\Http\Request;

class WebhookController extends CashierController
{
    public function handlePaymentCreated($payload) {
        Log::debug($event['data']['object']);
    }
}
