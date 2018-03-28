<?php
namespace App\Core\RenderManager\ViewConstructor;

/**
 * Class IndexViewConstructor
 * @package App\Core\RenderManager\ViewConstructor
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class IndexViewConstructor extends AbstractTwigViewConstructor
{
    protected const TWIG_VIEW_NAME = 'index.html.twig';

    protected function getContentData() : array
    {
        $content = $this->contentManager->getContent()->getContent();
        
        return [
            'content' => $content,
        ];
    }
}