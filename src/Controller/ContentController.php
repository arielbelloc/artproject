<?php
namespace App\Controller;

use App\Core\APIManager\APIManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Content Controller
 * Recibe todas las peticiones de las webs que muestran contenidos
 *
 * @Route("/")
 *
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class ContentController extends Controller
{
    /**
     * @Route("/")
     * @param APIManager $apiManager
     * @return mixed
     */
    public function index(APIManager $apiManager)
    {
        return new Response($apiManager
            ->getAPI()
            ->getResponse());
    }
}