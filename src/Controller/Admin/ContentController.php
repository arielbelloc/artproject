<?php
namespace App\Controller\Admin;

use App\Core\Admin\Services\Content;
use App\Core\Site\APIManager\APIManager;
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
     * @param Content $content
     * @return Response
     */
    public function getForm(Content $content)
    {
        try {
            return new Response($content->getForm());
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
    
    /**
     * @Route("/content", methods={"POST"})
     * @param APIManager $apiManager
     * @return Response
     */
    public function add(APIManager $apiManager, Request $request)
    {
        return new Response($apiManager
            ->getAPI()
            ->getResponse());
    }
}