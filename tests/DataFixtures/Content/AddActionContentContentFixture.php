<?php

namespace App\Tests\DataFixtures\Content;

use App\Entity\ActionContent;
use App\Tests\AbstractClass\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class AddActionContentContentFixture extends AbstractFixture
{
    /**
     * @var string
     */
    private $contentReferenceName;

    /**
     * @var string
     */
    private $property;

    /**
     * @var string
     */
    private $action;

    public function getDependenciesCollection()
    {
        return array(
            new LoadImageContentFixture(),
            new LoadTextContentFixture()
        );
    }

    /**
     * LoadImageContentFixture constructor.
     * @param $contentReferenceName
     */
    public function __construct(string $action, string $property, string $contentReferenceName) {
        $this->contentReferenceName = $contentReferenceName;
        $this->property = $property;
        $this->action = $action;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadActionContent($manager);

        $manager->flush();
    }
    
    private function loadActionContent(ObjectManager $manager)
    {
        $content = $this->getReference($this->contentReferenceName);

        $referenceName = sprintf('ActionContent_%s_%s', $this->action, $this->property);
        
        /** Si existe la referencia, no la vuelvo a cargar */
        if ($this->hasReference($referenceName)) {
            return;
        }
        
        $actionContent = new ActionContent();
        $actionContent
            ->setAction($this->action)
            ->setPropery($this->property)
            ->setContent($content)
        ;
        
        $this->setReference($referenceName, $actionContent);
        
        $manager->persist($actionContent);
    }
}