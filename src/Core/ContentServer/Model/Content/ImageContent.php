<?php
namespace App\Core\ContentServer\Model\Content;

class ImageContent extends AbstractContent
{
    /**
     * @return string
     */
    public function getImagePath() : string
    {
        return $this->contentEntity->getImagePath();
    }

    public function getArraySerialize() : array
    {
        $tempArray = parent::getArraySerialize();
        return array_merge($tempArray, ['imagePath' => $this->getImagePath()]);
    }
}