<?php
namespace App\Core\RenderManager;

use App\Core\RenderManager\ViewConstructor\ViewConstructorInterface;
use Psr\Container\ContainerInterface;

class RenderManager
{  
    private const VIEW_CONSTRUCTOR_SERVICE_ABSTRACT_NAME = 'App\Core\RenderManager\ViewConstructor\%sViewConstructor';
    
    const VIEW_CONSTRUCTOR_TYPE_INDEX = 'Index';
    const VIEW_CONSTRUCTOR_TYPE_DEFAULT = 'Default';

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    public function getViewConstructor(string $responseType) : ViewConstructorInterface
    {
        $serviceName = sprintf(self::VIEW_CONSTRUCTOR_SERVICE_ABSTRACT_NAME, $responseType);
        if (!$this->container->has($serviceName)) {
            $serviceName = $serviceName = sprintf(
                self::VIEW_CONSTRUCTOR_SERVICE_ABSTRACT_NAME, 
                self::VIEW_CONSTRUCTOR_TYPE_DEFAULT
            );
        }

        return $this->container->get($serviceName);
    }
}