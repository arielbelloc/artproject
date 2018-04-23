<?php
namespace App\Core\Site\ContentServer;

use App\Core\Site\BaseClass\AbstractServiceNameStrategy;
use App\Core\Site\ContentServer\Content\ContentInterface;

class ContentManager extends AbstractServiceNameStrategy
{
    private const CONTENT_SERVICE_ABSTRACT_NAME = 'App\Core\Site\ContentServer\Content\%s\%sContent';

    const CONTENT_TYPE_IMAGE = 'Image';
    const CONTENT_TYPE_BUNDLE = 'Bundle';
    const CONTENT_DEFAULT = 'App\Core\Site\ContentServer\Content\DefaultContent';

    public function getContent() : ContentInterface
    {
        return $this->getService(
            self::CONTENT_SERVICE_ABSTRACT_NAME,
            self::CONTENT_DEFAULT
        );
    }
}