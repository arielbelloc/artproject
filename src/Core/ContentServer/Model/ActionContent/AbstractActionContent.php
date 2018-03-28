<?php
namespace App\Core\ContentServer\Model\ActionContent;

use App\Core\ContentServer\Model\Content\ContentInterface;
use App\Core\ContentServer\Model\Content\ImageContent;
use App\Core\ContentServer\Model\Content\TextContent;
use App\Entity\ActionContent;
use App\Util\Parser;
use Psr\Log\InvalidArgumentException;

abstract class AbstractActionContent implements ActionContentInterface
{

    /**
     * @var array
     */
    protected $actionContent = [];
    
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
        
        /** TODO: Pasar a un Factory */
        $content = $actionContent->getContent();
        
        switch ($content->getType()) {
            case ContentInterface::TEXT_TYPE:
                $contentModel = new TextContent($content);
                break;
            case ContentInterface::IMAGE_TYPE:
                $contentModel = new ImageContent($content);
                break;
            default:
                throw new InvalidArgumentException();
        }
            
        $this->actionContent[$propertyName] = $contentModel;
    }
    
    public function getArrayContent() : array 
    {
        return $this->actionContent;
    }

    public function getObjectContent() : \stdClass
    {
        $actionContent = Parser::arrayToObject($this->actionContent); 
        return  $actionContent;
    }
}