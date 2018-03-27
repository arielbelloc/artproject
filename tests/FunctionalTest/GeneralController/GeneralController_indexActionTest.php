<?php

namespace App\Tests\FunctionalTest\GeneralController;

use App\Tests\AbstractClass\AbstractFunctionalTestCase;
use App\Tests\DataFixture\Content\LoadGeneralTextContentFixture;

class GeneralController_indexActionTest extends AbstractFunctionalTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->fixtureManager()->loadCollection([
            new LoadGeneralTextContentFixture(),
        ]);
    }

    public function testSuccess()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('body:contains("Test Index Context")')->count());
    }
}