<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/', function () {
    return view('welcome');
});

Route::get('setwebhook', function () {
    $response = Telegram::setWebhook(['url' => 'https://a9be-89-236-218-41.ngrok-free.app/api/telegram/webhook']);
});
