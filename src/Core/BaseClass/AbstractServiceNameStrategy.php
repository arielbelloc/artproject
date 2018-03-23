<?php
namespace App\Core\BaseClass;

use Psr\Container\ContainerInterface;

class AbstractServiceNameStrategy
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
    protected function getService(string $abstractName, string $type, string $default)
    {
        $serviceName = $this->getServiceName($abstractName, $type, $default);

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
    protected function getServiceName(string $abstractName, string $type, string $default)
    {
        $serviceName = sprintf($abstractName, $type);
        if (!$this->container->has($serviceName)) {
            $serviceName = $serviceName = sprintf($abstractName, $default);
        }
        
        return $serviceName;
    }
}