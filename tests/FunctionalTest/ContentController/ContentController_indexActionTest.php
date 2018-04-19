<?php
namespace App\Tests\FunctionalTest\ContentController;

use App\Tests\AbstractClass\AbstractFunctionalTestCase;
use App\Tests\DataFixtures\Content\AddActionContentContentFixture;

class ContentController_indexActionTest extends AbstractFunctionalTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->fixtureManager()->loadCollection([
            new AddActionContentContentFixture('index', 'text', 'TextContent'),
            new AddActionContentContentFixture('index', 'image', 'ImageContent')
        ]);
    }

    public function testSuccess()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('body:contains("Value_TextContent")')->count());
        $this->assertSame(1, $crawler->filter('body:contains("ImagePath_ImageContent")')->count());
    }
}