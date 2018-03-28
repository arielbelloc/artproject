<?php

namespace App\Tests\DataFixtures\Content;

use App\Entity\TextContent;
use App\Tests\AbstractClass\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTextContentFixture extends AbstractFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        if ($this->hasReference('TextContent')) {
            return;
        }
        
        $textContent = new TextContent();
        $textContent
            ->setValue('Value_TextContent')
            ->setDescription('Description_TextContent')
            ->setUUID('UUID_TextContent')
        ;
        $manager->persist($textContent);

        $this->addReference('TextContent', $textContent);
        
        $manager->flush();
    }
}
