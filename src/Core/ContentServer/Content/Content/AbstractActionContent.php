<?php
namespace App\Core\ContentServer\Content\Content;

use App\Core\ContentServer\Content\ContentInterface;
use App\Core\ContentServer\Model\ActionContent\ActionContentInterface;
use App\Core\ContentServer\Repository\ActionContentRepository;
use Doctrine\ORM\EntityManagerInterface;

class AbstractActionContent implements ContentInterface
{
    /**
     * @var ActionContentInterface
     */
    protected $actionContentModel;

    /**
     * @var EntityManagerInterface
     */
    protected $actionContentRepository;
    

    public function __construct(ActionContentRepository $repository)
    {
        $this->actionContentRepository = $repository;
    }

    public function getContent(): \stdClass
    {
        if (!$this->actionContentModel) {
            $this->setActionContentModel();
        }
        
        return $this->actionContentModel->getObjectContent();
    }
}