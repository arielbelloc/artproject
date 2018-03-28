<?php
namespace App\EventListener;

use App\Core\Context\Context;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class EventListener
{
    public function __construct(){}
    
    /**
     * Populo el objeto Context
     * 
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $action = $event->getController()[1];
        $requestParams = $event->getRequest()->request->all();
        $queryParams = $event->getRequest()->query->all();

        /** TODO: Quitar mock */
        Context::getContext()->hydrate([
            'request' => [
                'action' => $action,
                'request_params' => $requestParams,
                'query_params' => $queryParams,
            ],
            'owner' => [
                'id' => 1,
                'username' => 'Default',
            ],
            'user' => [
                'id' => null,
                'username' => 'anonymous',
            ],
        ]);
    }


}