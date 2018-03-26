<?php
namespace App\Core\Context;

class OwnerContext extends AbstractContext
{
    private $id;
    private $username;

    public function hydrate(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->username = $data['username'] ?? null;
    }
    
    public function arraySerialize() : array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
        ];
    }
}