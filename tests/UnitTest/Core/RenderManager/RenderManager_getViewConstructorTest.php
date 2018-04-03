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
        
        $renderManager = new RenderManager($this->getContainer());
        $renderStrategy = $renderManager->getViewConstructor();

        $this->assertInstanceOf(IndexViewConstructor::class, $renderStrategy);
    }

    public function testDefaultStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'test_action']]);

        $renderManager = new RenderManager($this->getContainer());
        $renderStrategy = $renderManager->getViewConstructor();

        $this->assertNotInstanceOf(IndexViewConstructor::class, $renderStrategy);
        $this->assertInstanceOf(DefaultViewConstructor::class, $renderStrategy);
    }
}