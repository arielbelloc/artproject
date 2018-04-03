<?php
namespace App\Tests\UnitTest\Core\RenderManager;

use App\Core\Context\Context;
use App\Core\RenderManager\RenderManager;
use App\Core\RenderManager\ViewConstructor\DefaultViewConstructor;
use App\Core\RenderManager\ViewConstructor\IndexViewConstructor;
use App\Tests\AbstractClass\AbstractUnitTestCase;

class RenderManager_getViewConstructorTest extends AbstractUnitTestCase
{
    public function testIndexStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'index']]);
        
        $apiManager = new RenderManager($this->getContainer());
        $apiStrategy = $apiManager->getViewConstructor();

        $this->assertInstanceOf(IndexViewConstructor::class, $apiStrategy);
    }

    public function testDefaultStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'test_action']]);

        $apiManager = new RenderManager($this->getContainer());
        $apiStrategy = $apiManager->getViewConstructor();

        $this->assertNotInstanceOf(IndexViewConstructor::class, $apiStrategy);
        $this->assertInstanceOf(DefaultViewConstructor::class, $apiStrategy);
    }
}