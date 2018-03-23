<?php
namespace App\Core\RenderManager;

use App\Core\BaseClass\AbstractServiceNameStrategy;
use App\Core\RenderManager\ViewConstructor\ViewConstructorInterface;

class RenderManager extends AbstractServiceNameStrategy
{  
    private const VIEW_CONSTRUCTOR_SERVICE_ABSTRACT_NAME = 'App\Core\RenderManager\ViewConstructor\%sViewConstructor';
    
    const VIEW_CONSTRUCTOR_TYPE_INDEX = 'Index';
    const VIEW_CONSTRUCTOR_TYPE_DEFAULT = 'Default';

    public function getViewConstructor(string $viewConstructorType) : ViewConstructorInterface
    {
        return $this->getService(
            self::VIEW_CONSTRUCTOR_SERVICE_ABSTRACT_NAME,
            $viewConstructorType,
            self::VIEW_CONSTRUCTOR_TYPE_DEFAULT
        );
        
    }
}