<?php
namespace App\Core\Site\ContentServer\Content;

interface ContentInterface
{
    public function getContent() : \stdClass;
}