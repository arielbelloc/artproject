<?php
namespace App\Core\APIManager\Controller;

use App\Core\APIManager\APIManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * General Controller
 *
 * @Route("/")
 *
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class GeneralController extends Controller
{
    /**
     * @Route("/")
     * @param APIManager $apiManager
     * @return mixed
     */
    public function indexAction(APIManager $apiManager)
    {
        return new Response($apiManager
            ->getAPI(APIManager::RESPONSE_TYPE_DEFAULT)
            ->getResponse());
    }
}