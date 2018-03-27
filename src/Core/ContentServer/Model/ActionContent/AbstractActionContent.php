<?php
namespace App\Core\ContentServer\Model\ActionContent;

abstract class AbstractActionContent
{
    public function __construct(array $contentCollection)
    {
        $this->hydrate($contentCollection);
    }

    protected function hydrate(array $contentCollection) {
        
    }
}