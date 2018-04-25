<?php
namespace App\Core\Site\ContentServer\Content\Site\Content;

use App\Core\Site\ContentServer\Model\ActionContent\IndexActionContent;
use App\Core\Site\Context\Context;

class IndexContent extends AbstractActionContent
{
    protected function setActionContentModel()
    {
        $action = Context::getContext()->request()->getAction();
        $actionContentCollection = $this->actionContentRepository->findByAction($action);
        $this->actionContentModel = new IndexActionContent($actionContentCollection);
    }
}