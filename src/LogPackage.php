<?php

declare(strict_types=1);

namespace Bone\Log;

use Barnacle\Container;
use Barnacle\RegistrationInterface;

class LogPackage implements RegistrationInterface
{
    /**
     * @param Container $c
     */
    public function addToContainer(Container $c)
    {
        if ($c->has('display_errors')) {
            ini_set('display_errors', $c->get('display_errors'));
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
            ini_set($c->get('error_log'), $errorLog);
        }
    }

    /**
     * @return string
     */
    public function getEntityPath(): string
    {
        return '';
    }

    /**
     * @return bool
     */
    public function hasEntityPath(): bool
    {
        return false;
    }
}