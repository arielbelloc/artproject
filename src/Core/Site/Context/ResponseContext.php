<?php
namespace App\Core\Site\Context;

class ResponseContext extends AbstractContext
{
    public function hydrate(array $data){}
    
    public function getArraySerialize() : array
    {
        return [];
    }
}