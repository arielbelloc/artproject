<?php
namespace App\Tests\AbstractClass;

use App\Tests\Component\AssertExtension;
use Doctrine\Common\DataFixtures\ReferenceRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\Container;

abstract class AbstractUnitTestCase extends KernelTestCase
{
    use AssertExtension;

    /**
     * @var string
     */
    private static $_environment = 'test';

    /**
     * @var Container
     */
    protected static $container;

    /**
     * @var  ReferenceRepository
     */
    protected $_oReferenceRepository;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::setGeneralProperties();
    }

    protected static function setGeneralProperties()
    {
        if (!self::$container) {
            $kernel = static::createKernel(array('environment' => self::$_environment));
            $kernel->boot();
            self::$container = $kernel->getContainer();
        }
    }
    
    /**
     * @return Container
     */
    public function getContainer() : Container
    {
        return self::$container;
    }
}