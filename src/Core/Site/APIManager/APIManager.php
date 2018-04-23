<?php
namespace App\Core\Site\APIManager;

use App\Core\Site\APIManager\API\APIInterface;
use App\Core\Site\BaseClass\AbstractServiceNameStrategy;

/**
 * Class APIManager
 * @package App\Core\APIManager
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class APIManager extends AbstractServiceNameStrategy
{
    private const API_MANAGER_SERVICE_ABSTRACT_NAME = 'App\Core\Site\APIManager\API\%s\%sAPI';

    const API_DEFAULT = 'App\Core\Site\APIManager\API\DefaultAPI';

    public function getAPI() : APIInterface
    {
        return $this->getService(
            self::API_MANAGER_SERVICE_ABSTRACT_NAME,
            self::API_DEFAULT
        );
    }
}