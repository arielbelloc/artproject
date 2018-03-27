<?php

namespace App\Tests\UnitTest\Entity;

use App\Entity\ImageContent;
use App\Entity\TextContent;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    public function testImageTypeSuccess()
    {
        $content = new ImageContent();
        $this->assertEquals('image', $content->getType());
    }

    public function testTextTypeSuccess()
    {
        $content = new TextContent();
        $this->assertEquals('text', $content->getType());
    }
    
}
