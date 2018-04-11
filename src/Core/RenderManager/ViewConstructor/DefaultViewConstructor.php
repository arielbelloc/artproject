<?php
namespace App\Core\RenderManager\ViewConstructor;

use Twig\Environment;

/**
 * Class DefaultViewConstructor
 * @package App\Core\RenderManager\ViewConstructor
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
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
        return $this->getRender($viewData);
    }
    
    protected function getContentData() : array
    {
        return [
            'test' => 'Hello World'
        ];
    }

    protected function getRender(array $viewData)
    {
        return $this->twig->render(self::TWIG_VIEW_NAME, $viewData);
    }
}