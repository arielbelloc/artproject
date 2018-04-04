<?php
namespace App\Core\ContentServer\Content;

interface ContentInterface
{
    public function getContent() : \stdClass;
}