<?php

namespace App\Tests\DataFixtures\Content;

use App\Entity\TextContent;
use App\Tests\AbstractClass\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGeneralTextContentFixture extends AbstractFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $textContent = new TextContent();
        $textContent
            ->setValue('Value_TextContent_general')
            ->setDescription('Description_TextContent_general')
            ->setUUID('UUID_TextContent_general')
        ;
        $manager->persist($textContent);

        $this->addReference('TextContent_general', $textContent);
        
        $manager->flush();
    }
}
