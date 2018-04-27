<?php
namespace App\Tests\UnitTest\Core\ContentServer;

use App\Core\Site\ContentServer\Content\DefaultContent;
use App\Core\Site\ContentServer\Content\Site\Content\IndexContent;
use App\Core\Site\ContentServer\ContentManager;
use App\Core\Site\Context\Context;
use App\Tests\AbstractClass\AbstractUnitTestCase;

class ContentManager_getContentTest extends AbstractUnitTestCase
{
    public function testIndexStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'index', 'namespace' => 'Site\Content']]);
        
        $contentManager = new ContentManager($this->getContainer());
        $contentStrategy = $contentManager->getContent();

        $this->assertInstanceOf(IndexContent::class, $contentStrategy);
    }

    public function testDefaultStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'test_action', 'namespace' => 'Site\Content']]);

        $contentManager = new ContentManager($this->getContainer());
        $contentStrategy = $contentManager->getContent();

        $this->assertNotInstanceOf(IndexContent::class, $contentStrategy);
        $this->assertInstanceOf(DefaultContent::class, $contentStrategy);
    }
}