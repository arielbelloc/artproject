<?php
namespace App\Core\ContentServer;

use App\Core\ContentServer\Content\ContentInterface;
use Psr\Container\ContainerInterface;

class ContentManager
{
    private const CONTENT_SERVICE_ABSTRACT_NAME = 'App\Core\ContentServer\Content\%sContent';

    const CONTENT_TYPE_IMAGE = 'Image';
    const CONTENT_TYPE_BUNDLE = 'Bundle';
    const CONTENT_TYPE_DEFAULT = 'Default';

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getContent(string $contentType) : ContentInterface
    {
        return $this->getService(
            self::CONTENT_SERVICE_ABSTRACT_NAME,
            $contentType,
            self::CONTENT_TYPE_DEFAULT
        );
    }
    
    protected function getService($abstractName, $type, $default)
    {
        $serviceName = sprintf($abstractName, $type);
        if (!$this->container->has($serviceName)) {
            $serviceName = $serviceName = sprintf($abstractName, $default);
        }

        return $this->container->get($serviceName);
    }
}