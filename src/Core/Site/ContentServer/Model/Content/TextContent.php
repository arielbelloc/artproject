<?php
namespace App\Core\Site\ContentServer\Model\Content;

class TextContent extends AbstractContent
{
    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->contentEntity->getValue();
    }

    public function getArraySerialize() : array
    {
        $tempArray = parent::getArraySerialize();
        return array_merge($tempArray, ['value' => $this->getValue()]);
    }
}