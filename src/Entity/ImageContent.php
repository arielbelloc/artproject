<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Core\ContentServer\Repository\ContentRepository")
 * @ORM\Table(name="image_content")
 * 
 */
class ImageContent extends Content
{
    const TYPE = 'image';
    
    /**
     * @ORM\Column(type="string", length=100)
     * @ORM\Column(name="image_path")
     */
    private $imagePath;

    /**
     * @return string
     */
    public function getImagePath() : ?string 
    {
        return $this->imagePath;
    }

    /**
     * @param string $imagePath
     * @return ImageContent
     */
    public function setImagePath(string $imagePath) : ImageContent
    {
        $this->imagePath = $imagePath;
        
        return $this;
    }

}