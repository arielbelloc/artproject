<?php
namespace App\Controller;

use App\Core\APIManager\APIManager;
use App\Core\Context\Context;
use App\Entity\ImageContent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
class AdminContentController extends Controller
{
    /**
     * @Route("/content", methods={"GET"})
     * @param APIManager $apiManager
     * @return Response
     */
    public function getContentForm(APIManager $apiManager)
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
    public function addContent(APIManager $apiManager)
    {
        return new Response($apiManager
            ->getAPI()
            ->getResponse());
    }
}