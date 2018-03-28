<?php
namespace App\Core\ContentServer\Model\Content;

class TextContent extends AbstractContent
{
    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->contentEntity->getValue();
    }
}