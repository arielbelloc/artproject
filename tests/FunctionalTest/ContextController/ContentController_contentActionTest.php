<?php
namespace App\Tests\FunctionalTest\ContentController;

use App\Entity\Content;
use App\Tests\AbstractClass\AbstractFunctionalTestCase;
use App\Tests\DataFixtures\Content\LoadImageContentFixture;
use App\Tests\DataFixtures\Content\LoadTextContentFixture;

class ContentController_contentActionTest extends AbstractFunctionalTestCase
{
    public function testImageContentSuccess()
    {
        $this->fixtureManager()->load(new LoadImageContentFixture());

        $test = $this->getRepository(Content::class)->findAll();

        $client = static::createClient();
        $crawler = $client->request('GET', '/content/UUID_ImageContent');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('body:contains("ImagePath_ImageContent")')->count());
    }
    
    /** TODO: Ver por qué no funcionan los test cuando se realizan request al mismo controller */
    /*
    public function testTextContentSuccess()
    {
        $this->fixtureManager()->load(new LoadTextContentFixture());

        $test = $this->getRepository(Content::class)->findAll();

        $client = static::createClient();
        $crawler = $client->request('GET', '/content/UUID_TextContent');
        
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('body:contains("Value_TextContent")')->count());
    }
    */
}