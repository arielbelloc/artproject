<?php
namespace App\Core\RenderManager\ViewConstructor;

/**
 * Class IndexViewConstructor
 * @package App\Core\RenderManager\ViewConstructor
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class ContentViewConstructor extends AbstractTwigViewConstructor
{
    protected const TWIG_VIEW_NAME = 'text_content.html.twig';

    protected function getContentData() : array
    {
        $content = $this->contentManager->getContent()->getContent();
        
        return [
            'content' => $content,
        ];
    }
}