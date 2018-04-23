<?php
namespace App\Core\Site\APIManager\API\Admin\Content;

use App\Core\Site\APIManager\API\APIInterface;
use App\Core\Site\ContentServer\Content\Admin\Content\AddContent;
use App\Core\Site\ContentServer\ContentManager;
use App\Core\Site\RenderManager\RenderManager;

/**
 * Class IndexAPI
 * @package App\Core\APIManager\API
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class AddAPI implements APIInterface {

    /**
     * @var RenderManager
     */
    protected $renderManager;

    /**
     * @var ContentManager
     */
    protected $contentManager;

    public function __construct(RenderManager $renderManager, AddContent $contentManager)
    {
        $this->renderManager = $renderManager;
        $this->contentManager = $contentManager;
    }
    
    public function getResponse()
    {
        $this->saveForm();
        return $this->renderManager
            ->getViewConstructor()
            ->render();
    }
    
    private function saveForm()
    {
        return $this->contentManager->addContent();
    }
}