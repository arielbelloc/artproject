<?php
namespace App\Core\Site\ContentServer\Content\Site\Content;

use App\Core\Site\ContentServer\Content\ContentInterface;
use App\Core\Site\ContentServer\Model\ActionContent\ActionContentInterface;
use App\Repository\ActionContentRepository;
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