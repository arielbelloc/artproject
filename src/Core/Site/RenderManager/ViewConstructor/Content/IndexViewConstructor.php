<?php
namespace App\Core\Site\RenderManager\ViewConstructor\Content;

/**
 * Class IndexViewConstructor
 * @package App\Core\RenderManager\ViewConstructor
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class IndexViewConstructor extends AbstractTwigViewConstructor
{
    protected $twigViewName = 'index.html.twig';

    protected function getContentData() : array
    {
        $content = $this->contentManager->getContent()->getContent();
        
        return [
            'content' => $content,
        ];
    }
}