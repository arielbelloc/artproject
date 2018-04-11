<?php
namespace App\Tests\UnitTest\Core\APIManager;

use App\Core\APIManager\API\Content\DefaultAPI;
use App\Core\APIManager\API\Content\IndexAPI;
use App\Core\BaseClass\AbstractServiceNameStrategy;
use App\Core\Context\Context;
use App\Tests\AbstractClass\AbstractUnitTestCase;

class AbstractServiceNameStrategy_getServiceTest extends AbstractUnitTestCase
{
    public function testSuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'index', 'namespace' => 'Content']]);
        $stub = $this->getMockForAbstractClass(AbstractServiceNameStrategy::class, [$this->getContainer()]);
        $service = $this->callPrivateMethod(
            $stub,
            'getService',
            [
                'App\Core\APIManager\API\%s\%sAPI',
                'Default'
            ]
        );

        $this->assertInstanceOf(IndexAPI::class, $service);
    }

    public function testDefaultSuccess()
    {
        Context::getContext()->hydrate(['request' => ['action' => 'non_exist_action', 'namespace' => 'Content']]);
        $stub = $this->getMockForAbstractClass(AbstractServiceNameStrategy::class, [$this->getContainer()]);
        $service = $this->callPrivateMethod(
            $stub,
            'getService',
            [
                'App\Core\APIManager\API\%s\%sAPI',
                'Default'
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