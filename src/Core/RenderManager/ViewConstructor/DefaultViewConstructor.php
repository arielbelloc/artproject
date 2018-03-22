<?php
namespace App\Core\RenderManager\ViewConstructor;

use Twig\Environment;

class DefaultViewConstructor implements ViewConstructorInterface
{
    protected const TWIG_VIEW_NAME = 'base.html.twig';

    /**
     * @var Environment
     */
    protected $twig;
    
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function render()
    {
        $viewData = $this->getContentData();
        return $this->twig->render(self::TWIG_VIEW_NAME, $viewData);
    }
    
    protected function getContentData()
    {
        return [
            'test' => 'Hello World'
        ];
    }
}