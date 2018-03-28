<?php
namespace App\Core\ContentServer\Model\ActionContent;

interface ActionContentInterface
{
    public function getObjectContent() : \stdClass;
    public function getArrayContent() : array;
}