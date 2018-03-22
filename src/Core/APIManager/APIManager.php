<?php
namespace App\Core\APIManager;

use App\Core\APIManager\API\APIInterface;
use Psr\Container\ContainerInterface;

class APIManager
{
    private const API_MANAGER_SERVICE_ABSTRACT_NAME = 'App\Core\APIManager\API\%sAPI';

    const RESPONSE_TYPE_DEFAULT = 'Default';

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    public function getAPI(string $apiType) : APIInterface
    {
        $serviceName = sprintf(self::API_MANAGER_SERVICE_ABSTRACT_NAME, $apiType);
        if (!$this->container->has($serviceName)) {
            $serviceName = $serviceName = sprintf(
                self::API_MANAGER_SERVICE_ABSTRACT_NAME,
                self::RESPONSE_TYPE_DEFAULT
            );
        }

        return $this->container->get($serviceName);
    }
}