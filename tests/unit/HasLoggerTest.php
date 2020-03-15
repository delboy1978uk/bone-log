<?php declare(strict_types=1);

namespace BoneTest;

use Bone\Log\Traits\HasLoggerTrait;
use Codeception\TestCase\Test;
use Psr\Log\LoggerInterface;

class HasLoggerTest extends Test
{
    public function testLogger()
    {
        $class = new class {
          use HasLoggerTrait;
        };

        $class->setLogger($this->makeEmpty(LoggerInterface::class));
        $this->assertInstanceOf(LoggerInterface::class, $class->getLogger());
    }
}
