<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

use PHPUnit\Framework\TestCase;

class JsonHelperTest extends TestCase
{
    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\JsonHelper::isJson()
     */
    public function testIsJon()
    {
        $this->assertFalse(JsonHelper::isJson(null));
        $this->assertFalse(JsonHelper::isJson(array()));
        $this->assertFalse(JsonHelper::isJson(array('key' => 'value')));
        $this->assertFalse(JsonHelper::isJson(true));
        $this->assertFalse(JsonHelper::isJson(false));

        $this->assertTrue(JsonHelper::isJson('{}'));
        $this->assertTrue(JsonHelper::isJson('{"key":"value"}'));
        $this->assertTrue(JsonHelper::isJson('{"key" : "value"}'));
        $this->assertFalse(JsonHelper::isJson('{\'key\':\'value\'}'));
    }
}
