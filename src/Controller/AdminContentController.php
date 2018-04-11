<?php
namespace App\Controller;

use App\Core\APIManager\APIManager;
use App\Core\Context\Context;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Content Controller
 * Recibe todas las peticiones de las webs que muestran contenidos
 *
 * @Route("/admin/{$userName}")
 *
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class AdminContentController extends Controller
{
    /**
     * @Route("/", methods={"GET"})
     * @param APIManager $apiManager
     * @return mixed
     */
    public function addContent(APIManager $apiManager)
    {
        return new Response($apiManager
            ->getAPI()
            ->getResponse());
    }
}