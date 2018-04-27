<?php
namespace App\Tests\FunctionalTest\ContentController\Admin;

use App\Entity\Content;
use App\Tests\AbstractClass\AbstractFunctionalTestCase;
use App\Tests\DataFixtures\Content\LoadImageContentFixture;

class ContentController_getFormActionTest extends AbstractFunctionalTestCase
{
    public function testImageContentSuccess()
    {
        $this->fixtureManager()->load(new LoadImageContentFixture());

        $client = static::createClient();
        $client->request('GET', '/admin/content');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }
}