<?php
namespace App\Core\Context;

class ResponseContext extends AbstractContext
{
    public function hydrate(array $data){}
    
    public function arraySerialize() : array
    {
        return [];
    }
}