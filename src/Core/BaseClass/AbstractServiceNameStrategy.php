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
     * @param string $default
     * 
     * @return mixed
     */
    protected function getService(string $abstractName, string $default) 
    {
        $serviceName = $this->getServiceName($abstractName, $default);

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
     * @param string $default
     * @return string
     */
    protected function getServiceName(string $abstractName, string $default) : string 
    {
        $type = Context::getContext()->request()->getActionToService();
        $namespace = Context::getContext()->request()->getNamespaceToService();
        $serviceName = sprintf($abstractName, $namespace, $type);
        if (!$this->container->has($serviceName)) {
            $serviceName =  $default;
        }
        
        return $serviceName;
    }
}