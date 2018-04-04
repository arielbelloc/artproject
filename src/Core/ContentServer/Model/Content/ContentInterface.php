<?php
namespace App\Core\ContentServer\Model\Content;

interface ContentInterface
{
    const IMAGE_TYPE = 'image';
    const TEXT_TYPE = 'text';
    
    public function getUUID() : string;
    public function getType() : string;
    public function getArraySerialize() : array;
    public function getObjectSerialize() : \stdClass;
}