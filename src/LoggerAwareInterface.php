<?php

namespace Bone\Log;

use Psr\Log\LoggerAwareInterface as PsrInterface;
use Psr\Log\LoggerInterface;

interface LoggerAwareInterface extends PsrInterface
{
    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void;

    /**
     * @return string
     */
    public function getChannel(): string;
}
