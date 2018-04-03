<?php
namespace App\Tests\FunctionalTest\ContextController;

use App\Core\ContentServer\Repository\ActionContentRepository;
use App\Tests\AbstractClass\AbstractFunctionalTestCase;

class ContextControllerTest extends AbstractFunctionalTestCase
{
    public function testSomething()
    {
        $test = $this->getContainer()->get(ActionContentRepository::class)->findAll();

        $client = $this->getClient();
        
        $crawler = $client->request('GET', '/');
        
        $html = $client->getResponse()->getContent();
        $this->assertSame(500, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('body:contains("Neither the property")')->count());
    }
}