<?php
namespace App\Core\APIManager\API\Admin\Content;

use App\Core\APIManager\API\APIInterface;
use App\Core\ContentServer\ContentManager;
use App\Core\Context\Context;
use App\Core\RenderManager\RenderManager;

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

    public function __construct(RenderManager $renderManager, ContentManager $contentManager)
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
        
        var_dump(
            Context::getContext()->request()->getArraySerialize()
        );
        
        exit();
        
    }
}