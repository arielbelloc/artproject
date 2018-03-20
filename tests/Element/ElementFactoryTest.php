<?php

namespace App\Tests\Element;

use PHPUnit\Framework\TestCase;

class ElementFactoryTest extends TestCase
{
    /*
     * @var ProductFactory
     */
    protected $productFactory;

    protected function setUp()
    {
        parent::setUp();

        $this->productFactory = $this->getContainer()->get('sas.factory.product');

        $this->addFixtureCollection(array(
            new AddContentReproductionInstanceToUser('qubit_argentina_user'),
        ));

        $this->loadFixtureCollection(true);
    }

    public function testCreateSuccess()
    {
        $subscriptionModel = $this
            ->getContainer()
            ->get('sas.factory.subscription')
            ->create($this->getReference('subscription_content_reproduction_qubit_argentina_user'));

        $contentReproductionInstanceModel = $this->productFactory->create($subscriptionModel);
        $this->assertInstanceOf(
            'SasBundle\Model\Product\ContentReproductionInstance',
            $contentReproductionInstanceModel
        );

        $this->assertEquals('824229c9-6ba4-4d59-b3e4-f5ca5b0ae5b2_TestContentUUID', $contentReproductionInstanceModel->getContentId());
    }
}
