<?php
namespace App\Core\Context;

class Payload extends AbstractContext
{
    private $payload = [];

    /**
     * @param array $payload
     * @return Payload
     */
    public function hydrate(array $payload) : Payload
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @return array
     */
    public function get() : array 
    {
        return $this->payload;
    }

    /**
     * @param string $itemKey
     * @return mixed
     */
    public function getItem(string $itemKey) 
    {
        if (!$this->hasItem($itemKey))
        {
            /** TODO: Lanzar excepción correcta */
            throw new \InvalidArgumentException();
        }
        
        return $this->get()[$itemKey];
    }

    /**
     * @param string $itemKey
     * @return mixed
     */
    public function hasItem(string $itemKey) 
    {
        return isset($this->get()[$itemKey]);
    }

    /**
     * @param array $payload
     * @return Payload
     */
    public function add(array $payload) : Payload
    {
        $this->payload = array_merge($this->payload, $payload);
        
        return $this;
    }

    /**
     * @return array
     */
    public function getArraySerialize() : array
    {
        return $this->get();
    }
}