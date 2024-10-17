<?php

namespace App\Telegram\Commands;

use GuzzleHttp\Client;

class BasicCommand
{
    protected $chatId;
    protected $token;
    protected $name;

    public function __construct($chatId, $name)
    {
        $this->chatId = $chatId;
        $this->name = $name;
        $this->token = env('TELEGRAM_BOT_TOKEN');
    }

    // Umumiy xabar yuborish funksiyasi
    public function sendMessage($text): void
    {
        $client = new Client();
        $client->post("https://api.telegram.org/bot{$this->token}/sendMessage", [
            'form_params' => [
                'chat_id' => $this->chatId,
                'text' => $text,
            ]
        ]);
    }

    // /start komandasini ko'rsatish
    public function start(): void
    {
        $this->sendMessage("{$this->name}, botga xush kelibsiz. Bot haqida ma'lumot olmoqchi bo'lsangiz /help ni bosing.");
    }

    // /help komandasini ko'rsatish
    public function help(): void
    {
        $this->sendMessage('Bot sizning eslatmalaringiz sifatida xizmat qiladi.');
    }
}
