<?php

namespace App\Tests\UnitTest\Core\Context;

use App\Core\Site\Context\Context;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    public function setUp()
    {
        Context::tearDown();
        parent::setUp();
    }
    
    public function tearDown()
    {
        Context::tearDown();
        parent::tearDown(); 
    }

    public function testContentComplexCase()
    {
        Context::getContext()->hydrate([
            'request' => [
                'query_params' => [
                    'test_query_params_key_01' => 'test_query_params_value_01',
                    'test_query_params_key_02' => 'test_query_params_value_02'
                ],
                'request_params' => [
                    'test_request_params_key' => 'test_request_params_value',
                ]
            ],
            'user' => [
                'id' => 3,
                'username' => 'test_username',
                'test_non_exist_key' => 'test_non_exist_value'
            ],
            'owner' => [
                'id' => 73,
                'username' => 'test_owner_username',
            ],
            'response' => [
                'test_non_exist_key' => 'test_non_exist_value'
            ]
            
            
        ]);

        $jsonSerialize = Context::getContext()->getJsonSerialize();

        $this->assertEquals(
            '{"request":{"action":null,"request_params":{"test_request_params_key":"test_request_params_value"},"query_params":{"test_query_params_key_01":"test_query_params_value_01","test_query_params_key_02":"test_query_params_value_02"}},"owner":{"id":73,"username":"test_owner_username"},"user":{"id":3,"username":"test_username"},"response":[]}',
            $jsonSerialize
        );
    }
    
    public function testRequestContent()
    {
        Context::getContext()->hydrate([
            'request' => [
                'query_params' => [
                    'test_query_params_key' => 'test_query_params_value'
                ]
            ]
        ]);
        
        $jsonSerialize = Context::getContext()->getJsonSerialize();
            
        $this->assertEquals(
            '{"request":{"action":null,"request_params":[],"query_params":{"test_query_params_key":"test_query_params_value"}},"owner":{"id":null,"username":null},"user":{"id":null,"username":null},"response":[]}',
            $jsonSerialize
        );
    }

    public function testRequestContentTwoVars()
    {
        Context::getContext()->hydrate([
            'request' => [
                'query_params' => [
                    'test_query_params_key_01' => 'test_query_params_value_01',
                    'test_query_params_key_02' => 'test_query_params_value_02'
                ]
            ]
        ]);

        $jsonSerialize = Context::getContext()->getJsonSerialize();

        $this->assertEquals(
            '{"request":{"action":null,"request_params":[],"query_params":{"test_query_params_key_01":"test_query_params_value_01","test_query_params_key_02":"test_query_params_value_02"}},"owner":{"id":null,"username":null},"user":{"id":null,"username":null},"response":[]}',
            $jsonSerialize
        );
    }
}
