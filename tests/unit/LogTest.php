<?php

namespace Barnacle\Tests;

use Barnacle\Container;
use Barnacle\Exception\NotFoundException;
use Bone\Firewall\FirewallPackage;
use Bone\Firewall\RouteFirewall;
use Bone\Http\Middleware\HalCollection;
use Bone\Http\Middleware\HalEntity;
use Bone\Http\Middleware\Stack;
use Bone\I18n\Form;
use Bone\I18n\Http\Middleware\I18nMiddleware;
use Bone\I18n\I18nPackage;
use Bone\I18n\Service\TranslatorFactory;
use Bone\I18n\View\Extension\LocaleLink;
use Bone\I18n\View\Extension\Translate;
use Bone\Log\LogPackage;
use Bone\Router\Router;
use Bone\View\ViewPackage;
use BoneTest\AnotherFakeRequestHandler;
use BoneTest\FakeController;
use BoneTest\FakeMiddleware;
use BoneTest\FakePackage\FakePackagePackage;
use BoneTest\FakeRequestHandler;
use BoneTest\MiddlewareTestHandler;
use Codeception\TestCase\Test;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Stream;
use Laminas\Diactoros\Uri;
use Laminas\I18n\Translator\Loader\Gettext;
use Laminas\I18n\Translator\Translator;
use League\Route\Route;
use Locale;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

class LogTest extends Test
{
    /** @var Container */
    protected $container;

    protected function _before()
    {
        $this->container = $c = new Container();
        $this->container['error_log'] = 'tests/_data/logs/error_log';
        $this->container['error_reporting'] = -1;
        $this->container['display_errors'] = false;
        $this->container['log'] = [
            'channels' => [
                'default' => 'tests/_data/logs/default_log',
            ],
        ];
    }

    protected function _after()
    {
        unset($this->container);
        unlink('tests/_data/logs/error_log');
    }

    public function testLogPackage()
    {
        $package = new LogPackage();
        $package->addToContainer($this->container);
        $this->assertTrue($this->container->has(LoggerInterface::class));
        $loggers = $this->container->get(LoggerInterface::class);
        $this->assertCount(1, $loggers);
        $this->assertArrayHasKey('default', $loggers);
        $this->assertInstanceOf(LoggerInterface::class, $loggers['default']);
    }
}
