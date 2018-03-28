<?php
namespace App\Core\ContentServer\Content;

use App\Core\ContentServer\Model\ActionContent\ActionContentInterface;
use App\Core\ContentServer\Model\ActionContent\IndexActionContent;
use App\Entity\ActionContent;
use App\Entity\TextContent;

class IndexContent extends DefaultContent
{
    protected function setActionContentModel()
    {
        $actionContent1 = new ActionContent();
        $textContent = new TextContent();
        $textContent->setValue('TEST TEXT CONTENT');
        $actionContent1->setContent($textContent);
        $actionContent1->setPropery('text');

        $actionContent2 = new ActionContent();
        $imageContent2 = new \App\Entity\ImageContent();
        $imageContent2->setImagePath('TEST IMAGE CONTENT');
        $actionContent2->setContent($imageContent2);
        $actionContent2->setPropery('image');

        $actionContentCollectionMock = [
            $actionContent1,
            $actionContent2
        ];

        $this->actionContentModel = new IndexActionContent($actionContentCollectionMock);
    }
}