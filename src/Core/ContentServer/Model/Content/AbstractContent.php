<?php
namespace App\Core\ContentServer\Model\Content;

use App\Entity\Content;
use App\Util\Parser;

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

    public function getArraySerialize() : array
    {
        return [
            'uuid' => $this->getUUID(),
            'type' => $this->getType(),
        ];
    }

    public function getObjectContent() : \stdClass
    {
        $actionContent = Parser::arrayToObject($this->getArraySerialize());
        return  $actionContent;
    }
    
}