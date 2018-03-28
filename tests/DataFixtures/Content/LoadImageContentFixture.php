<?php

namespace App\Tests\DataFixtures\Content;

use App\Entity\ImageContent;
use App\Tests\AbstractClass\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadImageContentFixture extends AbstractFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        if ($this->hasReference('ImageContent')) {
            return;
        }
        
        $imageContent = new ImageContent();
        $imageContent
            ->setImagePath('ImagePath_ImageContent')
            ->setDescription('Description_ImageContent')
            ->setUUID('UUID_ImageContent')
        ;
        $manager->persist($imageContent);

        $this->addReference('ImageContent', $imageContent);
        
        $manager->flush();
    }
}
