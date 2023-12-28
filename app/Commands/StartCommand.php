<?php

namespace App\Commands;

use App\Models\TelegramUser;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Methods\Commands;
use Telegram\Bot\Objects\User;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Запуск / Перезапуск бота';
    protected TelegramUser $telegramUser;

    public function __construct(TelegramUser $telegramUser)
    {
        $this->telegramUser = $telegramUser;
    }

    public function handle()
    {
        $userData = $this->getUpdate()->message->from;

        $userId = $userData->id;

        $telegramUser = $this->telegramUser->where('user_id','=', $userId)->first();

        if($telegramUser){
            $this->sendAnswerForOldUsers();
        } else {
            $this->addNewTelegramUser($userData);
            $this->sendAnswerForNewUsers();
        }

    }

    public function sendAnswerForNewUsers()
    {
        $this->replyWithMessage([
            'text' => 'Вітаємо у нашому телеграм боті!️️️️️️️'
        ]);
    }
    public function sendAnswerForOldUsers()
    {
        $this->replyWithMessage([
            'text' => 'Раді вас бачити знову!☺️️️️️️️'
        ]);
    }

    public function addNewTelegramUser(User $userData)
    {
        $this->telegramUser->insert([
            'user_id' => $userData->id,
            'username' => $userData->username,
            'first_name' => $userData->first_name,
            'last_name' => $userData->last_name,
            'language_code' => $userData->language_code,
            'is_premium' => $userData->is_premium,
            'is_bot' => $userData->is_bot,
        ]);
    }
}
