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
     * @ORM\Column(type="string", length=250, name="description")
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
     * @return string
     */
    public function getDescription() : string 
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return Content
     */
    public function setDescription($description) : Content
    {
        $this->description = $description;
        
        return $this;
    }

    public function getType() : string
    {
        $specificContent = get_class($this);
        return $specificContent::TYPE;
    }
}