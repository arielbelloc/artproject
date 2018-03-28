<?php
namespace App\Core\ContentServer\Content;

use App\Core\ContentServer\Model\ActionContent\ActionContentInterface;

class DefaultContent implements ContentInterface
{
    /**
     * @var ActionContentInterface
     */
    protected $actionContentModel;

    public function __construct()
    {
        $this->setActionContentModel();
    }

    public function getContent(): \stdClass
    {
        return $this->actionContentModel->getObjectContent();
    }

    protected function setActionContentModel()
    {
        /** TODO: Terminar */
    }
}