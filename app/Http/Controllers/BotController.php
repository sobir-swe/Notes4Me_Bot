<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Telegram\Commands\BasicCommand;

class BotController extends Controller
{
    public function handle(Request $request): \Illuminate\Http\JsonResponse
    {
        $update = $request->input();
        if (isset($update['message']['text'])) {
            $text = $update['message']['text'];
            $chatId = $update['message']['chat']['id'];
            $name = $update['message']['from']['first_name'];
            $username = $update['message']['from']['username'] ?? null;

            $userController = new UserController();
            $user = $userController->findOrCreateUser($name, $username, $chatId);

            if ($text === '/start') {
                $command = new BasicCommand($chatId, $name);
                $command->start();
            } elseif ($text === '/help') {
                $command = new BasicCommand($chatId, $name);
                $command->help();
            }
        }

        return response()->json(['status' => 'ok']);
    }

}
