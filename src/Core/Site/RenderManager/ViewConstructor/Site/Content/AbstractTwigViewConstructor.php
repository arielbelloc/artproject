<?php
namespace App\Core\Site\RenderManager\ViewConstructor\Site\Content;

use App\Core\Site\ContentServer\ContentManager;
use App\Core\Site\RenderManager\ViewConstructor\ViewConstructorInterface;
use Twig\Environment;

/**
 * Class AbstractTwigViewConstructor
 * @package App\Core\RenderManager\ViewConstructor
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
abstract class AbstractTwigViewConstructor implements ViewConstructorInterface
{
    protected $twigViewName = 'base.html.twig';

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
        return $this->twig->render($this->twigViewName, $viewData);
    }
}