<?php
namespace App\Core\Site\ContentServer\Model\ActionContent;

interface ActionContentInterface
{
    public function getObjectContent() : \stdClass;
    public function getArrayContent() : array;
}