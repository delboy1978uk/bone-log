<?php

namespace Bone\Log;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggerFactory
{
    /**
     * @param array $config
     * @return array
     */
    public function createLoggers(array $config): array
    {
        $logChannels = [];

        foreach ($config['channels'] as $name => $path) {
            $logger = new Logger($name);
            $logger->pushHandler(new StreamHandler($path, Logger::DEBUG));
            $logChannels[$name] = $logger;
        }

        return $logChannels;
    }
}