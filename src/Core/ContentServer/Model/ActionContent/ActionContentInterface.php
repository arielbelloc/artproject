<?php
namespace App\Core\ContentServer\Model\ActionContent;

interface ActionContentInterface
{
    const IMAGE_TYPE = 'image';
    
    public function getUUID() : string;
    public function getType() : string;
}