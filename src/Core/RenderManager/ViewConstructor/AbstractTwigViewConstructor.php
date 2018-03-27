<?php
namespace App\Core\RenderManager\ViewConstructor;

use App\Core\ContentServer\ContentManager;
use Twig\Environment;

abstract class AbstractTwigViewConstructor implements ViewConstructorInterface
{
    protected const TWIG_VIEW_NAME = 'base.html.twig';

    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @var ContentManager
     */
    protected $contentManager;

    /**
     * AbstractTwigViewConstructor constructor.
     * @param Environment $twig
     * @param ContentManager $contentManager
     */
    public function __construct(Environment $twig, ContentManager $contentManager)
    {
        $this->twig = $twig;
        $this->contentManager = $contentManager;
    }

    /**
     * @return string
     */
    public function render() : string 
    {
        $viewData = $this->getContentData();
        return $this->getRender($viewData);
    }

    /**
     * @param array $viewData
     * @return string
     */
    protected function getRender(array $viewData) : string 
    {
        $childClass = get_class($this);
        return $this->twig->render($childClass::TWIG_VIEW_NAME, $viewData);
    }
}