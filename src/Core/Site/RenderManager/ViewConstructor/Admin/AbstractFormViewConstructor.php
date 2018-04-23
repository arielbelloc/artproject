<?php
namespace App\Core\Site\RenderManager\ViewConstructor\Admin;

use App\Core\Site\ContentServer\ContentManager;
use App\Core\Site\RenderManager\ViewConstructor\ViewConstructorInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Twig\Environment;

/**
 * Class AbstractTwigViewConstructor
 * @package App\Core\RenderManager\ViewConstructor
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
abstract class AbstractFormViewConstructor implements ViewConstructorInterface
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
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * AbstractFormViewConstructor constructor.
     * @param Environment $twig
     * @param ContentManager $contentManager
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(Environment $twig, ContentManager $contentManager, FormFactoryInterface $formFactory)
    {
        $this->twig = $twig;
        $this->contentManager = $contentManager;
        $this->formFactory = $formFactory;
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

    /**
     * @param null $data
     * @param array $options
     * @return FormBuilderInterface
     */
    protected function createFormBuilder($data = null, array $options = array()): FormBuilderInterface
    {
        return $this->formFactory->createBuilder(FormType::class, $data, $options);
    }
}