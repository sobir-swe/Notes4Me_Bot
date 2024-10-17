<?php

use App\Http\Controllers\BotController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('telegram/webhook', [BotController::class, 'handle']);
