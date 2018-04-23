<?php
namespace App\Tests\FunctionalTest\ContextController;

use App\Core\Site\ContentServer\Repository\ActionContentRepository;
use App\Tests\AbstractClass\AbstractFunctionalTestCase;

/**
 * TODO: Ver por qué no corre en el general
 */
class ContextController extends AbstractFunctionalTestCase
{
    public function testSomething()
    {
        $test = $this->getContainer()->get(ActionContentRepository::class)->findAll();
        
        $client = static::createClient();
        $crawler = $client->request('GET', '/asdffsd');
        
        $html = $client->getResponse()->getContent();
        $this->assertSame(500, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('body:contains("Neither the property")')->count());
    }
}