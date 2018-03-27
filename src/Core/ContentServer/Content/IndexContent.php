<?php
namespace App\Core\ContentServer\Content;

use App\Core\ContentServer\Model\ActionContent\ActionContentInterface;
use App\Core\ContentServer\Model\ActionContent\IndexActionContent;

class IndexContent implements ContentInterface
{
    /**
     * @var ActionContentInterface
     */
    protected $actionContentModel;
    
    public function __construct()
    {
        $this->setActionContentModel();
    }

    public function getContent() : ActionContentInterface 
    {
        return $this->actionContentModel;
    }
    
    public function setActionContentModel()
    {
        $this->actionContentModel = new IndexActionContent();
    }
}