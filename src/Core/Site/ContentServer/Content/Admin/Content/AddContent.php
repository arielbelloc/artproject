<?php
namespace App\Core\Site\ContentServer\Content\Admin\Content;

use App\Core\RenderManager\Form\ContentType;
use App\Entity\Content;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class AddContent
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManger;

    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @var Request
     */
    protected $request;
    public function __construct(EntityManagerInterface $entityManager, FormFactoryInterface $formFactory, RequestStack $requestStack)
    {
        $this->entityManager = $entityManager;
        $this->formFacqtory = $formFactory;

        $this->request = $requestStack->getCurrentRequest();
    }
    
    public function addContent()
    {
        $content = new Content();
        $form = $this->formFactory
            ->createBuilder(ContentType::class, $content)
            ->getForm();

        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $content = $form->getData();

            $this->entityManager->persist($content);
            $this->entityManager->flush();

            return true;
        }

        return false;
    }
}