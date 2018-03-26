<?php
namespace App\Core\Context;

class Context extends AbstractContext
{
    private static $instance;
    
    protected $user;
    protected $owner;
    protected $request;
    protected $response;
    
    
    private function __construct(){
        $this->user = new UserContext();
        $this->owner = new OwnerContext();
        $this->request = new RequestContext();
        $this->response = new ResponseContext();
    }
    
    public static function getContext() : Context
    {
        if (!self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }
    
    public function hydrate(array $data)
    {
        if (isset($data['request'])) {
            $this->hydrateRequestContext($data['request']);
        }

        if (isset($data['owner'])) {
            $this->hydrateOwnerContext($data['owner']);
        }

        if (isset($data['user'])) {
            $this->hydrateUserContext($data['user']);
        }

        if (isset($data['response'])) {
            $this->hydrateResponseContext($data['response']);
        }
    }
    
    public function hydrateRequestContext(array $data)
    {
        $this->request->hydrate($data);
    }
    
    public function hydrateOwnerContext(array $data)
    {
        $this->owner->hydrate($data);
    }

    public function hydrateUserContext(array $data)
    {
        $this->user->hydrate($data);
    }
    
    public function hydrateResponseContext(array $data)
    {
        $this->response->hydrate($data);
    }
    
    public function arraySerialize() : array
    {
        return [
            'request' => $this->request->arraySerialize(),
            'owner' => $this->owner->arraySerialize(),
            'user' => $this->user->arraySerialize(),
            'response' => $this->response->arraySerialize(),
        ];
    }

        public function getUser() : UserContext
    {
        return $this->user;
    }

    public function getOwner() : OwnerContext
    {
        return $this->owner;
    }

    public function getRequest() : RequestContext
    {
        return $this->request;
    }

    public function getResponse() : ResponseContext
    {
        return $this->response;
    }
    
    public static function tearDown()
    {
        self::$instance = null;
    }
}