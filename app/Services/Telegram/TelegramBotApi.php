<?php
declare(strict_types=1);

namespace App\Services\Telegram;

use http\Exception\RuntimeException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramBotApi
{
    public const TELEGRAM_HOST = 'https://api.telegram.org/bot';

    public static function sendMessage(string $token, int $chat_id, string $message) : bool
    {

        try {

            $response = Http::post(self::TELEGRAM_HOST . $token . '/sendMessage', [
                'chat_id'  => $chat_id,
                'text' => $message
            ]);

            if(!$response->json('ok')) {
                throw new RuntimeException('TelegramBotApi::sendMessage error ' . json_encode($response->json()));
            }

        }catch (\Throwable $exception) {
            Log::error($exception->getMessage());
            return false;
        }

        return true;
    }
}
