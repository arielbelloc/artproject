<?php
namespace App\Core\ContentServer\Content\Content;

interface ContentInterface
{
    public function getContent() : \stdClass;
}