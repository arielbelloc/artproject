<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Core\ContentServer\Repository\ActionContentRepository")
 * @ORM\Table(name="action_content") 
 */
class ActionContent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string", length=100)
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Content")
     * @ORM\JoinColumn(name="content_uuid", referencedColumnName="uuid")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=50, name="action", nullable=false)
     */
    private $action;

    /**
     * @ORM\Column(type="string", length=50, name="property", nullable=true)
     */
    private $propery;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Content
     */
    public function getContent() : Content
    {
        return $this->content;
    }

    /**
     * @param $content
     * @return ActionContent
     */
    public function setContent($content) : ActionContent
    {
        $this->content = $content;
        
        return $this;
    }

    /**
     * @return string
     */
    public function getAction() : string
    {
        return $this->action;
    }

    /**
     * @param $action
     * @return ActionContent
     */
    public function setAction($action) : ActionContent
    {
        $this->action = $action;
        
        return $this;
    }

    /**
     * @return string
     */
    public function getPropery() : string
    {
        return $this->propery;
    }

    /**
     * @param $propery
     * @return ActionContent
     */
    public function setPropery($propery) : ActionContent
    {
        $this->propery = $propery;
        
        return $this;
    }
    
    
}