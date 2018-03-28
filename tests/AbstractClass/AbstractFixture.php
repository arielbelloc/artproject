<?php
namespace App\Tests\AbstractClass;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

abstract class AbstractFixture extends Fixture
{
    public function getDependenciesCollection(){
        return array();
    }

    public function loadDependencies(ObjectManager $manager) {
        $dependenciesCollection = $this->getDependenciesCollection();
        foreach ($dependenciesCollection as $dependency) {
            $dependency->setReferenceRepository($this->referenceRepository);
            $dependency->loadDependencies($manager);
            $dependency->load($manager);
        }
    }
}