<?php
namespace App\Core\ContentServer;

use App\Core\BaseClass\AbstractServiceNameStrategy;
use App\Core\ContentServer\Content\ContentInterface;

class ContentManager extends AbstractServiceNameStrategy
{
    private const CONTENT_SERVICE_ABSTRACT_NAME = 'App\Core\ContentServer\Content\%sContent';

    const CONTENT_TYPE_IMAGE = 'Image';
    const CONTENT_TYPE_BUNDLE = 'Bundle';
    const CONTENT_TYPE_DEFAULT = 'Default';

    public function getContent() : ContentInterface
    {
        return $this->getService(self::CONTENT_SERVICE_ABSTRACT_NAME, self::CONTENT_TYPE_DEFAULT);
    }
}