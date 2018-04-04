<?php
namespace App\Core\ContentServer\Factory;

use App\Entity\Content;
use Psr\Container\ContainerInterface;

class ContentFactory
{
    const ABSTRACT_CONTENT_MODEL_SERVICE_NAME = 'App\Core\ContentServer\Model\Content\%sContent'; 
    
    /**
     * @var ContainerInterface
     */
    protected $container;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    public function getModel(Content $contentEntity)
    {
        $contentModelServiceName = sprintf(
            self::ABSTRACT_CONTENT_MODEL_SERVICE_NAME,
            ucfirst($contentEntity->getType())
        );
        
        if (!class_exists($contentModelServiceName)) {
            /** TODO: Lanzar la excepción correcta */
            throw new \InvalidArgumentException();
        }
        
        $model = new $contentModelServiceName($contentEntity);
        
        return $model;
    }
}