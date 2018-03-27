<?php
namespace App\Tests\Component;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\DataFixtures\ReferenceRepository;
use Doctrine\ORM\EntityManager;

/**
 * Class FixtureManager
 * @package App\Tests\BaseClass
 * @author  Ariel Belloc <abelloc@qubit.tv>
 * @license Propietary
 * @link    http://qubit.tv
 */
class FixtureManager
{
    /*************
     * SINGLETON *
     *************/
    /**
     * @var FixtureManager
     */
    private static $instance;

    /**
     * @var EntityManager
     */
    private $em;
    
    private function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param EntityManager $em
     * @return FixtureManager
     */
    public static function getInstance(EntityManager $em)
    {
        if (!self::$instance instanceof self)
        {
            self::$instance = new self($em);
        }
        return self::$instance;
    }

    /*****************
     * END SINGLETON *
     *****************/

    /**
     * @var array
     */
    protected  $fixtureCollection = array();

    /**
     * @var  ReferenceRepository
     */
    protected $referenceRepository;

    /**
     * @return EntityManager
     */
    public function getEntityManager() : EntityManager
    {
        return $this->em;
    }

    /**
     * @param Fixture $fixture
     */
    public  function load(Fixture $fixture) {
        $fixture->setReferenceRepository($this->getReferenceRepository());
        $fixture->load($this->getEntityManager());
    }

    /**
     * @return ReferenceRepository
     */
    public  function getReferenceRepository() {
        if (is_null($this->referenceRepository)) {
            $this->referenceRepository = new ReferenceRepository($this->getEntityManager());
        }
        return $this->referenceRepository;
    }

    /**
     * @param Fixture $fixture
     */
    public  function add(Fixture $fixture)
    {
        $this->fixtureCollection[] = $fixture;
    }

    /**
     * @param array $fixtureCollection
     */
    public  function addCollection(array $fixtureCollection)
    {
        $this->fixtureCollection = array_merge($this->fixtureCollection, $fixtureCollection);
    }

    public  function loadCollection(array $collection = array())
    {
        $this->fixtureCollection = array_merge($this->fixtureCollection, $collection); 
        foreach ($this->fixtureCollection as $fixture) {
            $this->load($fixture);
        }

        // Limpio la colección de fixtures ya cargados.
        $this->fixtureCollection = array();
    }

    public function reset()
    {
        $this->referenceRepository = null;
        $this->purgueSchema();
    }

    protected function purgueSchema() {
        $purger = new ORMPurger($this->getEntityManager());

        $purger->setPurgeMode(ORMPurger::PURGE_MODE_TRUNCATE);
        $purger->purge();
    }
}