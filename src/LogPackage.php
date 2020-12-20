<?php declare(strict_types=1);

namespace Bone\Log;

use Barnacle\Container;
use Barnacle\RegistrationInterface;
use Psr\Log\LoggerInterface;

class LogPackage implements RegistrationInterface
{
    /**
     * @param Container $c
     * @return array
     * @throws \Exception
     */
    public function addToContainer(Container $c)
    {
        if ($c->has('display_errors')) {
            ini_set('display_errors', (string) $c->get('display_errors'));
        }

        if ($c->has('error_reporting')) {
            error_reporting($c->get('error_reporting'));
        }

        if ($c->has('error_log')) {
            $errorLog = $c->get('error_log');
            if (!file_exists($errorLog)) {
                file_put_contents($errorLog, '');
                chmod($errorLog, 0775);
            }
            ini_set('error_log', $errorLog);
        }

        if ($c->has('log')) {
            $c[LoggerInterface::class] = $c->factory(function (Container $c) {
                $config = $c->get('log');
                $loggerFactory = new LoggerFactory();

                return $loggerFactory->createLoggers($config);
            });
        }
    }
}
