<?php
namespace App\Core\ContentServer\Content;

use App\Core\ContentServer\Model\ActionContent\ActionContentInterface;

interface ContentInterface
{
    public function getContent() : ActionContentInterface;
}