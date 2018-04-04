<?php
namespace App\Tests\FunctionalTest\ContentController;

use App\Tests\AbstractClass\AbstractFunctionalTestCase;
use App\Tests\DataFixtures\Content\AddActionContentContentFixture;
use App\Tests\DataFixtures\Content\LoadTextContentFixture;

class ContentController_contentActionTest extends AbstractFunctionalTestCase
{
    public function testTextContentSuccess()
    {
        $this->fixtureManager()->load(new LoadTextContentFixture());
        
        $client = static::createClient();
        $crawler = $client->request('GET', '/content/UUID_TextContent');
        
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('body:contains("Value_TextContent")')->count());
        $html = $client->getResponse()->getContent();
    }
}