<?php
namespace App\Core\Context;


abstract class AbstractContext implements ContextInterface
{
    public function jsonSerialize() : string
    {
        return json_encode($this->arraySerialize());
    }

    public function objectSerialize() : \stdClass
    {
        return json_decode($this->jsonSerialize());
    }
}