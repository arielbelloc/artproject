<?php
namespace App\Core\RenderManager\ViewConstructor;

class IndexViewConstructor extends AbstractTwigViewConstructor
{
    protected const TWIG_VIEW_NAME = 'index.html.twig';

    protected function getContentData() : array
    {
        $content = $this->contentManager->getContent();
        
        return [
            'content' => $content,
        ];
    }
}