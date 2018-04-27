<?php
namespace App\Core\Admin\Services;

use App\Core\Admin\Form\ContentType;
use App\Core\Site\APIManager\APIManager;
use App\Entity\Content as ContentEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class Content
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
     * @var APIManager
     */
    protected $apiManager;

    /**
     * @var Request
     */
    protected $request;
    public function __construct(EntityManagerInterface $entityManager, FormFactoryInterface $formFactory, RequestStack $requestStack, APIManager $apiManager)
    {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->apiManager = $apiManager;

        $this->request = $requestStack->getCurrentRequest();
    }
    
    public function getForm()
    {
        return $this->apiManager
            ->getAPI()
            ->getResponse();
    }
    
    public function contentForm()
    {
        $content = new ContentEntity();
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