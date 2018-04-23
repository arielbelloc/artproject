<?php
namespace App\Tests\UnitTest\Core\ContentServer;

use App\Core\Site\ContentServer\Model\ActionContent\IndexActionContent;
use App\Entity\ActionContent;
use App\Entity\ImageContent;
use App\Entity\TextContent;
use PHPUnit\Framework\TestCase;

class ActionContentModelTest extends TestCase
{
    public function testHydrateSuccess()
    {
        $actionContentModel = new IndexActionContent($this->getMock());
        
        $this->assertTrue(true);
    }

    public function testGetArrayContentSuccess()
    {
        $actionContentModel = new IndexActionContent($this->getMock());

        $arrayContent = $actionContentModel->getArrayContent();
        
        $this->assertTrue(is_array($arrayContent));
        $this->assertTrue(isset($arrayContent['text']));
        $this->assertTrue(isset($arrayContent['image']));

        $this->assertTrue($arrayContent['image'] instanceof \App\Core\Site\ContentServer\Model\Content\ImageContent);
        $this->assertEquals($arrayContent['image']->getImagePath(), 'TEST IMAGE CONTENT');

        $this->assertTrue($arrayContent['text'] instanceof \App\Core\Site\ContentServer\Model\Content\TextContent);
        $this->assertEquals($arrayContent['text']->getValue(), 'TEST TEXT CONTENT');
    }

    public function testGetObjectContentSuccess()
    {
        $actionContentModel = new IndexActionContent($this->getMock());

        $objectContent = $actionContentModel->getObjectContent();
        $this->assertTrue($objectContent instanceof \stdClass);
        $this->assertTrue(property_exists($objectContent, 'text'));
        $this->assertTrue(property_exists($objectContent, 'image'));

        $this->assertTrue($objectContent->image instanceof \App\Core\Site\ContentServer\Model\Content\ImageContent);
        $this->assertEquals($objectContent->image->getImagePath(), 'TEST IMAGE CONTENT');

        $this->assertTrue($objectContent->text instanceof \App\Core\Site\ContentServer\Model\Content\TextContent);
        $this->assertEquals($objectContent->text->getValue(), 'TEST TEXT CONTENT');
    }

    /**
     * @return array
     */
    protected function getMock() : array
    {
        $actionContent1 = new ActionContent();
        $textContent = new TextContent();
        $textContent->setValue('TEST TEXT CONTENT');
        $actionContent1->setContent($textContent);
        $actionContent1->setPropery('text');

        $actionContent2 = new ActionContent();
        $imageContent2 = new ImageContent();
        $imageContent2->setImagePath('TEST IMAGE CONTENT');
        $actionContent2->setContent($imageContent2);
        $actionContent2->setPropery('image');

        $actionContentCollectionMock = [
            $actionContent1,
            $actionContent2
        ];
        
        return $actionContentCollectionMock;
    }
}