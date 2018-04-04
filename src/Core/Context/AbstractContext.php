<?php
namespace App\Core\Context;


abstract class AbstractContext implements ContextInterface
{
    public function getJsonSerialize() : string
    {
        return json_encode($this->getArraySerialize());
    }

    public function getObjectSerialize() : \stdClass
    {
        return json_decode($this->getJsonSerialize());
    }
}