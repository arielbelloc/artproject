<?php
namespace App\Core\RenderManager\ViewConstructor\Admin\Content;

use App\Core\RenderManager\Form\ContentType;
use App\Core\RenderManager\ViewConstructor\AdminContent\AbstractFormViewConstructor;
use App\Entity\Content;

class GetFormViewConstructor extends AbstractFormViewConstructor
{
    protected $twigViewName = 'admin_content/add_content.html.twig';

    protected function getContentData() : array
    {
        $content = new Content();
        $form = $this->formFactory->create(ContentType::class, $content);
        
        return [
            'form' => $form->createView(),
        ];
    }
}