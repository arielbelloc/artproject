<?php
namespace App\Core\ContentServer\Content;

use App\Core\ContentServer\Model\ActionContent\ActionContentInterface;
use App\Core\ContentServer\Repository\ActionContentRepository;
use Doctrine\ORM\EntityManagerInterface;

class DefaultContent implements ContentInterface
{
    /**
     * @var ActionContentInterface
     */
    protected $actionContentModel;

    /**
     * @var EntityManagerInterface
     */
    protected $actionContentRepository;
    

    public function __construct(ActionContentRepository $actionContentRepository)
    {
        $this->actionContentRepository = $actionContentRepository;
    }

    public function getContent(): \stdClass
    {
        if (!$this->actionContentModel) {
            $this->setActionContentModel();
        }
        
        return $this->actionContentModel->getObjectContent();
    }

    protected function setActionContentModel()
    {
        /** TODO: Terminar */
    }
}