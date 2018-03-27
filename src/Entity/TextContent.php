<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Core\ContentServer\Repository\ContentRepository")
 * @ORM\Table(name="text_content")
 * 
 */
class TextContent extends Content
{
    const TYPE = 'text';
    
    /**
     * @ORM\Column(type="text")
     * @ORM\Column(name="value")
     */
    private $value;

    /**
     * @return string
     */
    public function getValue() : string 
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return TextContent
     */
    public function setValue(string $value) : TextContent
    {
        $this->value = $value;
        
        return $this;
    }

}