<?php
namespace App\Tests\UnitTest\Core\ContentServer;

use App\Core\APIManager\API\DefaultAPI;
use App\Core\APIManager\API\IndexAPI;
use App\Core\APIManager\APIManager;
use App\Core\ContentServer\Content\DefaultContent;
use App\Core\ContentServer\Content\IndexContent;
use App\Core\ContentServer\ContentManager;
use App\Core\Context\Context;
use App\Tests\AbstractClass\AbstractUnitTestCase;

class ContentManager_getContentTest extends AbstractUnitTestCase
{
    public function testIndexStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'index']]);
        
        $contentManager = new ContentManager($this->getContainer());
        $contentStrategy = $contentManager->getContent();

        $this->assertInstanceOf(IndexContent::class, $contentStrategy);
    }

    public function testDefaultStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'test_action']]);

        $contentManager = new ContentManager($this->getContainer());
        $contentStrategy = $contentManager->getContent();

        $this->assertNotInstanceOf(IndexContent::class, $contentStrategy);
        $this->assertInstanceOf(DefaultContent::class, $contentStrategy);
    }
}