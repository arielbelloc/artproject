<?php
namespace App\Core\ContentServer\Model\Content;

use App\Entity\Content;

abstract class AbstractContent
{
    /**
     * @var Content
     */
    protected $contentEntity;

    /**
     * AbstractContent constructor.
     * @param Content $content
     */
    public function __construct(Content $content)
    {
        $this->contentEntity = $content;
    }

    /**
     * @return string
     */
    public function getUUID() : string
    {
        return $this->contentEntity->getUUID();
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->contentEntity->getType();
    }
}