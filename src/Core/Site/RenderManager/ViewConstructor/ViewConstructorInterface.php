<?php
namespace App\Core\Site\RenderManager\ViewConstructor;

/**
 * Interface ViewConstructorInterface
 * Estrategia para el renderizado de contenidos
 * 
 * @package App\Core\RenderManager\ViewConstructor
 */
interface ViewConstructorInterface
{
    public function render();
}