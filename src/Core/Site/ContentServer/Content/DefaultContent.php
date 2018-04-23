<?php
namespace App\Core\Site\ContentServer\Content;

class DefaultContent implements ContentInterface
{
    public function getContent(): \stdClass
    {
        return new \stdClass();
    }
}