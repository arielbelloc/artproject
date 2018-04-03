<?php
namespace App\Tests\AbstractClass;

use App\Tests\Component\FixtureManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;

class AbstractFunctionalTestCase extends AbstractUnitTestCase
{
    /**
     * @var bool
     */
    protected static $schemaIsCreated = false;

    /**
     * @var EntityManager
     */
    protected static $em;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::createSchema();
    }
    
    protected function getEntityManager()
    {
        return $this->getContainer()->get('doctrine')->getManager();
    }

    protected static function createSchema()
    {
        $em = self::$client->getContainer()
            ->getContainer()
            ->get('doctrine')
            ->getManager();
        
        $schemaTool = new SchemaTool($em);
        $metadata = $em->getMetadataFactory()->getAllMetadata();
        // Drop and recreate tables for all entities
        $schemaTool->dropSchema($metadata);
        $schemaTool->createSchema($metadata);
    }
    
    protected function tearDown() {
        parent::tearDown();
        $this->getEntityManager()->clear();
        $this->fixtureManager()->reset();
    }

    /**
     * @return FixtureManager
     */
    protected function fixtureManager() : FixtureManager
    {
        return FixtureManager::getInstance($this->getEntityManager());
    }
    
    protected function getRepository($repositoryName)
    {
        return $this->getEntityManager()->getRepository($repositoryName);
    }

    protected static function getPrivateMethod($className, $methodName) : \ReflectionMethod
    {
        $class = new \ReflectionClass($className);
        $method = $class->getMethod($methodName);
        $method->setAccessible(true);

        return $method;
    }

    protected static function getPrivateProperty($className, $property) : \ReflectionProperty
    {
        $class = new \ReflectionClass($className);
        $property = $class->getProperty($property);
        $property->setAccessible(true);

        return $property;
    }

    public function callPrivateMethod($object, string $method, array $args = array())
    {
        $methodInvoke = self::getPrivateMethod(get_class($object), $method);
        return $methodInvoke->invokeArgs($object, $args);
    }

    public function callPrivateProperty($object, string $property)
    {
        $methodInvoke = self::getPrivateProperty(get_class($object), $property);
        return $methodInvoke->getValue($object);
    }
}