<?php
namespace App\Core\RenderManager;

use App\Core\BaseClass\AbstractServiceNameStrategy;
use App\Core\RenderManager\ViewConstructor\ViewConstructorInterface;

/**
 * Class RenderManager
 * Define la estrategia que va a renderizar el contenido
 * 
 * @package App\Core\RenderManager
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class RenderManager extends AbstractServiceNameStrategy
{  
    private const VIEW_CONSTRUCTOR_SERVICE_ABSTRACT_NAME = 'App\Core\RenderManager\ViewConstructor\%s\%sViewConstructor';
    
    const VIEW_CONSTRUCTOR_TYPE_INDEX = 'Index';
    const VIEW_CONSTRUCTOR_TYPE_DEFAULT = 'App\Core\RenderManager\ViewConstructor\DefaultViewConstructor';

    public function getViewConstructor() : ViewConstructorInterface
    {
        $service = $this->getService(
            self::VIEW_CONSTRUCTOR_SERVICE_ABSTRACT_NAME,
            self::VIEW_CONSTRUCTOR_TYPE_DEFAULT
        );
        
        return $service;
    }
}