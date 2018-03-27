<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Core\ContentServer\Repository\ContentRepository")
 * @ORM\Table(name="content")
 * 
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="content_type_name", type="string", fieldName="content_type_field")
 */
class Content
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string", length=100)
     */
    private $uuid;

    /**
     * @ORM\Column(type="string", length=100, name="description")
     */
    private $description;
    
    /**
     * @return string
     */
    public function getUUID() : string 
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     * @return $this
     */
    public function setUUID(string $uuid) : Content
    {
        $this->uuid = $uuid;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}