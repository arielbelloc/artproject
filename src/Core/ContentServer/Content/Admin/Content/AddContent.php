<?php
namespace App\Core\ContentServer\Content\Admin\Content;

use App\Core\ContentServer\Content\ContentInterface;
use App\Core\ContentServer\Factory\ContentFactory;
use App\Core\ContentServer\Repository\ContentRepository;
use App\Core\Context\Context;
use Symfony\Component\Form\FormFactoryInterface;

class AddContent implements ContentInterface
{
    protected $repository;
    protected $contentModel;
    protected $contentFactory;

    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;
    
    public function __construct(ContentRepository $repository, ContentFactory $contentFactory, FormFactoryInterface $formFactory)
    {
        $this->repository = $repository;
        $this->contentFactory = $contentFactory;
        $this->formFactory = $formFactory;

    }
    
    public function addContent()
    {        
        $this->checkForm();
    }
    
    protected function checkForm()
    {
        return true;
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