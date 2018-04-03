<?php
namespace App\Core\BaseClass;

use App\Core\Context\Context;
use Psr\Container\ContainerInterface;

abstract class AbstractServiceNameStrategy
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * AbstractServiceNameStrategy constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Return the service from a abstract name. 
     * 
     * @param string $abstractName
     * @param string $type
     * @param string $default
     * 
     * @return mixed
     */
    protected function getService(string $abstractName, string $default, string $type = null)
    {
        $type = $type ?? Context::getContext()->getRequest()->getActionToService();
        
        $serviceName = $this->getServiceName($abstractName, $default, $type);

        if (!$this->container->has($serviceName))
        {
            /** TODO: Lanzar la excepción correcta */
            throw new \InvalidArgumentException();
        }
        
        return $this->container->get($serviceName);
    }

    /**
     * Return the service name from a abstract name.
     * 
     * @param string $abstractName
     * @param string $type
     * @param string $default
     * @return string
     */
    protected function getServiceName(string $abstractName, string $default, string $type)
    {
        $serviceName = sprintf($abstractName, $type);
        if (!$this->container->has($serviceName)) {
            $serviceName = $serviceName = sprintf($abstractName, $default);
        }
        
        return $serviceName;
    }
}