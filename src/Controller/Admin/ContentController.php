<?php
namespace App\Controller\Admin;

use App\Core\APIManager\APIManager;
use App\Core\RenderManager\Form\ContentType;
use App\Entity\Content;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Content Controller
 * Recibe todas las peticiones de las webs que muestran contenidos
 *
 * @Route("/admin")
 *
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class ContentController extends Controller
{
    /**
     * @Route("/content", methods={"GET"})
     * @param APIManager $apiManager
     * @return Response
     */
    public function getForm(APIManager $apiManager)
    {
        return new Response($apiManager
            ->getAPI()
            ->getResponse());
    }
    
    /**
     * @Route("/content", methods={"POST"})
     * @param APIManager $apiManager
     * @return Response
     */
    public function add(APIManager $apiManager, Request $request)
    {
        $content = new Content();
        $form = $this->createForm(ContentType::class, $content);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $content = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($content);
            $entityManager->flush();

            return new Response('TODO OK');
        }

        return $this->render('admin/content/form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}