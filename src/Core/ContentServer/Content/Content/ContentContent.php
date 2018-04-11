<?php
namespace App\Core\ContentServer\Content\Content;

use App\Core\ContentServer\Content\ContentInterface;
use App\Core\ContentServer\Factory\ContentFactory;
use App\Core\ContentServer\Repository\ContentRepository;
use App\Core\Context\Context;

class ContentContent implements ContentInterface
{
    protected $repository;
    protected $contentModel;
    protected $contentFactory;

    public function __construct(ContentRepository $repository, ContentFactory $contentFactory)
    {
        $this->repository = $repository;
        $this->contentFactory = $contentFactory; 
    }

    protected function setContentModel()
    {
        $contentUUId = Context::getContext()->request()->payload()
            ->getItem('content_uuid');

        $content = $this->repository->find($contentUUId);
        $this->contentModel = $this->contentFactory->getModel($content);
    }

    public function getContent(): \stdClass
    {
        if (!$this->contentModel) {
            $this->setContentModel();
        }

        return $this->contentModel->getObjectContent();
    }
}