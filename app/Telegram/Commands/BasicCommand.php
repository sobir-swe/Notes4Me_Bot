<?php

namespace App\Telegram\Command;

class BasicCommand extends BasicCommand
{
    // Til tanlash uchun klaviaturani yuborish
    public function showLanguageOptions()
    {
        $keyboard = [
            'keyboard' => [
                [['text' => 'O‘zbekcha'], ['text' => 'English']]
            ],
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
        ];

        $this->sendKeyboard('Please choose a language:', $keyboard);
    }

    // Klaviaturani yuborish funksiyasi
    public function sendKeyboard($text, $keyboard)
    {
        $client = new Client();
        $client->post("https://api.telegram.org/bot{$this->token}/sendMessage", [
            'form_params' => [
                'chat_id' => $this->chatId,
                'text' => $text,
                'reply_markup' => json_encode($keyboard),
            ]
        ]);
    }

    // O‘zbek tilini tanlaganda
    public function chooseUzbek()
    {
        $this->sendMessage('Siz O‘zbek tilini tanladingiz!');
    }

    // Ingliz tilini tanlaganda
    public function chooseEnglish()
    {
        $this->sendMessage('You have selected English!');
    }
}
