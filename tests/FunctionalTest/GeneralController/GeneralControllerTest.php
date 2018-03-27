<?php

namespace App\Tests\FunctionalTest\GeneralController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GeneralControllerTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('body:contains("Hello World")')->count());
    }
}