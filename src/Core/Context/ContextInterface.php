<?php
namespace App\Core\Context;

interface ContextInterface
{
    public function hydrate(array $data);
    
    public function jsonSerialize() : string;
    
    public function arraySerialize() : array;
    
    public function objectSerialize() : \stdClass;
}