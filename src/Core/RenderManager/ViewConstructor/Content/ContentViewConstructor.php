<?php
namespace App\Core\RenderManager\ViewConstructor\Content;

/**
 * Class IndexViewConstructor
 * @package App\Core\RenderManager\ViewConstructor
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class ContentViewConstructor extends AbstractTwigViewConstructor
{
    protected $twigViewName = '%s_content.html.twig';

    protected function getContentData() : array
    {
        $content = $this->contentManager->getContent()->getContent();
        
        $this->twigViewName = sprintf($this->twigViewName, $content->type);
            
        return [
            'content' => $content,
        ];
    }
}