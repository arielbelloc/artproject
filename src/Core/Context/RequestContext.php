<?php
namespace App\Core\Context;

class RequestContext extends AbstractContext
{
    private $action;
    private $namespace;
    private $requestParams;
    private $queryParams;
    private $payload;

    public function hydrate(array $data)
    {
        $this->action = $data['action'] ?? null;
        $this->namespace = $data['namespace'] ?? null;
        $this->requestParams = $data['request_params'] ?? [];
        $this->queryParams = $data['query_params'] ?? [];
        $this->payload = new Payload();
    }

    public function getArraySerialize() : array
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

    public function getNamespace() : string
    {
        return $this->namespace;
    }

    public function getNamespaceToService() : string
    {
        return ucfirst($this->namespace);
    }

    public function getAction() : string
    {
        return $this->action;
    }

    /**
     * @return Payload
     */
    public function payload() : Payload 
    {
        return $this->payload;
    }
}