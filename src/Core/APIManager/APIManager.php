<?php
namespace App\Core\APIManager;

use App\Core\APIManager\API\APIInterface;
use App\Core\BaseClass\AbstractServiceNameStrategy;

/**
 * Class APIManager
 * @package App\Core\APIManager
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class APIManager extends AbstractServiceNameStrategy
{
    private const API_MANAGER_SERVICE_ABSTRACT_NAME = 'App\Core\APIManager\API\%sAPI';

    const API_TYPE_DEFAULT = 'Default';

    public function getAPI(string $apiType) : APIInterface
    {
        return $this->getService(self::API_MANAGER_SERVICE_ABSTRACT_NAME, self::API_TYPE_DEFAULT);
    }
}