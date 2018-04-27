<?php
namespace App\Tests\UnitTest\Core\APIManager;

use App\Core\Site\APIManager\API\DefaultAPI;
use App\Core\Site\APIManager\API\Site\Content\IndexAPI;
use App\Core\General\BaseClass\AbstractServiceNameStrategy;
use App\Core\Site\Context\Context;
use App\Tests\AbstractClass\AbstractUnitTestCase;

class AbstractServiceNameStrategy_getServiceTest extends AbstractUnitTestCase
{
    public function testSuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'index', 'namespace' => 'Site\Content']]);
        $stub = $this->getMockForAbstractClass(AbstractServiceNameStrategy::class, [$this->getContainer()]);
        $service = $this->callPrivateMethod(
            $stub,
            'getService',
            [
                'App\Core\Site\APIManager\API\%s\%sAPI',
                'App\Core\Site\APIManager\API\DefaultAPI'
            ]
        );

        $this->assertInstanceOf(IndexAPI::class, $service);
    }

    public function testDefaultSuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'non_exist_action', 'namespace' => 'Site\Content']]);
        $stub = $this->getMockForAbstractClass(AbstractServiceNameStrategy::class, [$this->getContainer()]);
        $service = $this->callPrivateMethod(
            $stub,
            'getService',
            [
                'App\Core\Site\APIManager\API\%s\%sAPI',
                'App\Core\Site\APIManager\API\DefaultAPI'
            ]
        );

        $this->assertInstanceOf(DefaultAPI::class, $service);
    }
    
    public function testFail()
    {
        $stub = $this->getMockForAbstractClass(AbstractServiceNameStrategy::class, [$this->getContainer()]);
        try{
            $this->callPrivateMethod(
                $stub,
                'getService',
                [
                    'test_not_exist_service_abstract',
                    'test_not_exist_service_default'
                ]
            );
            
            $this->assertTrue(
                false, 
                'El método getService debería haber lanzado la excepción InvalidArgumentException'
            );
        } catch (\InvalidArgumentException $exception) {
            $this->assertTrue(true);
        } catch (\Exception $exception) {
            $this->assertTrue(
                false,
                'El método getService debería haber lanzado la excepción InvalidArgumentException'
            );
        }
    }
}