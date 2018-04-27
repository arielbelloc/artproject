<?php
namespace App\Tests\UnitTest\Core\RenderManager;

use App\Core\Site\Context\Context;
use App\Core\Site\RenderManager\RenderManager;
use App\Core\Site\RenderManager\ViewConstructor\DefaultViewConstructor;
use App\Core\Site\RenderManager\ViewConstructor\Site\Content\IndexViewConstructor;
use App\Tests\AbstractClass\AbstractUnitTestCase;

class RenderManager_getViewConstructorTest extends AbstractUnitTestCase
{
    public function testIndexStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'index', 'namespace' => 'Site\Content']]);
        
        $renderManager = new RenderManager($this->getContainer());
        $renderStrategy = $renderManager->getViewConstructor();

        $this->assertInstanceOf(IndexViewConstructor::class, $renderStrategy);
    }

    public function testDefaultStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'test_action', 'namespace' => 'Site\Content']]);

        $renderManager = new RenderManager($this->getContainer());
        $renderStrategy = $renderManager->getViewConstructor();

        $this->assertNotInstanceOf(IndexViewConstructor::class, $renderStrategy);
        $this->assertInstanceOf(DefaultViewConstructor::class, $renderStrategy);
    }
}