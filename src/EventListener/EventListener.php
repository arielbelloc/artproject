<?php
namespace App\EventListener;

use App\Core\Context\Context;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

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
        $namespace = $this->getNamespace($event);
        $requestParams = $event->getRequest()->request->all();
        $queryParams = $event->getRequest()->query->all();
        
        /** TODO: Quitar mock */
        Context::getContext()->hydrate([
            'request' => [
                'action' => $action,
                'namespace' => $namespace,
                'request_params' => $requestParams,
                'query_params' => $queryParams,
                'request_object' => $event->getRequest(),
            ],
            'owner' => [
                'id' => null,
                'username' => 'anonymous_owner',
            ],
            'user' => [
                'id' => null,
                'username' => 'anonymous_user',
            ],
        ]);
    }

    private function getNamespace(FilterControllerEvent $event) : string 
    {
        $controller = $event->getController()[0];
        $controllerName = get_class($controller);
        $namespace = str_replace('App\Controller\\', '', $controllerName);
        $namespace = str_replace('Controller', '', $namespace);
        
        return $namespace;
    }
}