<?php
namespace App\Core\RenderManager\ViewConstructor;

/**
 * Class IndexViewConstructor
 * @package App\Core\RenderManager\ViewConstructor
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class AddContentViewConstructor extends AbstractTwigViewConstructor
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