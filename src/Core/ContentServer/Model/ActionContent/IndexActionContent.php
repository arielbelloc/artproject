<?php
namespace App\Core\ContentServer\Model\ActionContent;

use App\Entity\ActionContent;

class IndexActionContent extends AbstractActionContent
{
    protected $actionContent;
    
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
    
    protected function setProperty(ActionContent $actionContent)
    {
        $propertyName = $actionContent->getPropery();
        $this->actionContent->{$propertyName} = $actionContent->getContent();
    }
}