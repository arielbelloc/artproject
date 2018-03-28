<?php
namespace App\Core\Context;

/**
 * Interface ContextInterface
 * Contexto en el que se debe procesar una petición.
 * 
 * @package App\Core\Context
 */
interface ContextInterface
{
    public function hydrate(array $data);
    
    public function jsonSerialize() : string;
    
    public function arraySerialize() : array;
    
    public function objectSerialize() : \stdClass;
}