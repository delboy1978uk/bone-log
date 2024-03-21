<?php declare(strict_types=1);

namespace BoneTest;

use Bone\Log\Traits\HasLoggerTrait;
use Codeception\Test\Unit;
use Psr\Log\LoggerInterface;

class HasLoggerTest extends Unit
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
