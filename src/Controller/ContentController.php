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

    /**
     * @Route("/content/{contentUUId}")
     * @param APIManager $apiManager
     * @param string $contentUUId
     * @return mixed
     */
    public function content(string $contentUUId, APIManager $apiManager)
    {
        Context::getContext()->request()->payload()->add([
            'content_uuid' => $contentUUId
        ]);
        
        return new Response($apiManager
            ->getAPI()
            ->getResponse());
    }
}