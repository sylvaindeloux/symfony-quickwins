<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

use PHPUnit\Framework\TestCase;

class UrlHelperTest extends TestCase
{
    public function testIsHttps()
    {
        $this->assertFalse(UrlHelper::isHttps('http://www.eax.fr'));
        $this->assertTrue(UrlHelper::isHttps('https://www.eax.fr'));
    }
}
