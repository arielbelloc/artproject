<?php
namespace App\Core\APIManager\API\Content;

use App\Core\RenderManager\RenderManager;

/**
 * Class DefaultAPI
 * @package App\Core\APIManager\API
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
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