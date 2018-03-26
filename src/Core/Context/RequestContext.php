<?php
namespace App\Core\Context;

class RequestContext extends AbstractContext
{
    private $action;
    private $requestParams;
    private $queryParams;

    public function hydrate(array $data)
    {
        $this->action = $data['action'] ?? null;
        $this->requestParams = $data['request_params'] ?? [];
        $this->queryParams = $data['query_params'] ?? [];
    }

    public function arraySerialize() : array
    {
        return [
            'action' => $this->action,
            'request_params' => $this->requestParams,
            'query_params' => $this->queryParams,
        ];
    }
    
    public function getActionToService() : string 
    {
        return ucfirst($this->action);
    }
}