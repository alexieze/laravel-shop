<?php

namespace App\Logger\Telegram;

use Monolog\Logger;

class TelegramFactoryLogger
{
    public function __invoke(array $config): Logger
    {
        $logger = new Logger('telegram');
        $logger->pushHandler(new TelegramLoggerHandler($config));

        return $logger;
    }
}
