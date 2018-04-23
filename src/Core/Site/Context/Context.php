<?php
namespace App\Core\Site\Context;

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
            $this->request()->hydrate($data['request']);
        }

        if (isset($data['owner'])) {
            $this->owner()->hydrate($data['owner']);
        }

        if (isset($data['user'])) {
            $this->user()->hydrate($data['user']);
        }

        if (isset($data['response'])) {
            $this->response()->hydrate($data['response']);
        }
    }
    
    
    public function getArraySerialize() : array
    {
        return [
            'request' => $this->request->getArraySerialize(),
            'owner' => $this->owner->getArraySerialize(),
            'user' => $this->user->getArraySerialize(),
            'response' => $this->response->getArraySerialize(),
        ];
    }

    public function user() : UserContext
    {
        return $this->user;
    }

    public function owner() : OwnerContext
    {
        return $this->owner;
    }

    public function request() : RequestContext
    {
        return $this->request;
    }

    public function response() : ResponseContext
    {
        return $this->response;
    }
    
    public static function tearDown()
    {
        self::$instance = null;
    }
}