<?php
namespace App\Core\Context;

use Symfony\Component\HttpFoundation\Request;

class RequestContext extends AbstractContext
{
    /**
     * @var string|null
     */
    private $action;

    /**
     * @var string|null
     */
    private $namespace;

    /**
     * @var string|null
     */
    private $requestParams;

    /**
     * @var string|null
     */
    private $queryParams;

    /**
     * @var Payload|null
     */
    private $payload;

    /**
     * @var Request|null
     */
    private $requestObject;

    /**
     * @param array $data
     * @return RequestContext
     */
    public function hydrate(array $data) : RequestContext
    {
        $this->action = $data['action'] ?? null;
        $this->namespace = $data['namespace'] ?? null;
        $this->requestParams = $data['request_params'] ?? [];
        $this->queryParams = $data['query_params'] ?? [];
        $this->payload = new Payload();
        $this->requestObject = $data['request_object'] ?? null;
        
        return $this;
    }

    /**
     * @return array
     */
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
    
    public function getRequestObject() : Request
    {
        return $this->requestObject;
    }
}