<?php
namespace App\Core\ContentServer\Content\Content;

class DefaultContent implements ContentInterface
{
    public function getContent(): \stdClass
    {
        return new \stdClass();
    }
}