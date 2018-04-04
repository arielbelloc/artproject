<?php
namespace App\Core\ContentServer\Content;

use App\Core\ContentServer\Model\ActionContent\IndexActionContent;
use App\Core\Context\Context;

class IndexContent extends AbstractActionContent
{
    protected function setActionContentModel()
    {
        $action = Context::getContext()->request()->getAction();
        $actionContentCollection = $this->actionContentRepository->findByAction($action);
        $this->actionContentModel = new IndexActionContent($actionContentCollection);
    }
}