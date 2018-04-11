<?php
namespace App\Tests\UnitTest\Core\APIManager;

use App\Core\APIManager\API\Content\DefaultAPI;
use App\Core\APIManager\API\Content\IndexAPI;
use App\Core\APIManager\APIManager;
use App\Core\Context\Context;
use App\Tests\AbstractClass\AbstractUnitTestCase;

class APIManager_getAPITest extends AbstractUnitTestCase
{
    public function testIndexStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'index', 'namespace' => 'content']]);
        
        $apiManager = new APIManager($this->getContainer());
        $apiStrategy = $apiManager->getAPI();

        $this->assertInstanceOf(IndexAPI::class, $apiStrategy);
    }

    public function testDefaultStrategySuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'test_action', 'namespace' => 'content']]);

        $apiManager = new APIManager($this->getContainer());
        $apiStrategy = $apiManager->getAPI();

        $this->assertNotInstanceOf(IndexAPI::class, $apiStrategy);
        $this->assertInstanceOf(DefaultAPI::class, $apiStrategy);
    }
}