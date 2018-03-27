<?php
namespace App\Core\ContentServer\Model\ActionContent;

use App\Core\ContentServer\Model\Content\ContentInterface;

class IndexActionContent extends AbstractActionContent
{
    public function __construct(array $contentCollection)
    {
        $this->hydrate($contentCollection);
    }

    protected function hydrate(array $contentCollection) {
        foreach ($contentCollection as $content)
        {
            $this->setProperty($content);
        }
    }
    
    protected function setProperty(ActionCon $content)
    {
        $content->getType();
    }
}