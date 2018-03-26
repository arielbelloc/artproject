<?php
namespace App\Core\APIManager\API;

use App\Core\RenderManager\RenderManager;

class DefaultAPI implements APIInterface
{
    /**
     * @var RenderManager
     */
    protected $renderManager;
    
    public function __construct(RenderManager $renderManager)
    {
        $this->renderManager = $renderManager;
    }

    public function getResponse()
    {
        return $this->renderManager
            ->getViewConstructor()
            ->render();
    }
}