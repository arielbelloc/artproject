<?php
namespace App\Core\Site\RenderManager\ViewConstructor\Admin\Content;

use App\Core\Site\RenderManager\Form\ContentType;
use App\Core\Site\RenderManager\ViewConstructor\Admin\AbstractFormViewConstructor;
use App\Entity\Content;

class GetFormViewConstructor extends AbstractFormViewConstructor
{
    protected $twigViewName = 'admin/content/form.html.twig';

    protected function getContentData() : array
    {
        $content = new Content();
        $form = $this->formFactory->create(ContentType::class, $content);
        
        return [
            'form' => $form->createView(),
        ];
    }
}