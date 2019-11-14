<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

use PHPUnit\Framework\TestCase;

class UrlHelperTest extends TestCase
{
    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\UrlHelper::isHttps()
     */
    public function testIsHttps()
    {
        $this->assertFalse(UrlHelper::isHttps('http://www.eax.fr'));
        $this->assertTrue(UrlHelper::isHttps('https://www.eax.fr'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\UrlHelper::isSameDomain()
     */
    public function testIsSameDomain()
    {
        $this->assertTrue(UrlHelper::isSameDomain('http://12.34.56.78', 'http://12.34.56.78'));
        $this->assertTrue(UrlHelper::isSameDomain('http://12.34.56.78/path', 'http://12.34.56.78/path'));
        $this->assertTrue(UrlHelper::isSameDomain('http://domain', 'http://domain'));
        $this->assertTrue(UrlHelper::isSameDomain('http://domain.fr', 'http://domain.fr'));
        $this->assertTrue(UrlHelper::isSameDomain('http://domain.fr', 'https://domain.fr'));
        $this->assertTrue(UrlHelper::isSameDomain('http://domain.fr/path', 'http://domain.fr/path'));
        $this->assertTrue(UrlHelper::isSameDomain('http://domain.fr/path', 'https://domain.fr/path'));
        $this->assertTrue(UrlHelper::isSameDomain('https://domain', 'https://domain'));
        $this->assertTrue(UrlHelper::isSameDomain('https://domain.fr', 'https://domain.fr'));
        $this->assertTrue(UrlHelper::isSameDomain('https://domain.fr/path', 'https://domain.fr/path'));
        $this->assertTrue(UrlHelper::isSameDomain('http://subdomain.domain', 'http://subdomain.domain'));
        $this->assertTrue(UrlHelper::isSameDomain('http://subdomain.domain.fr', 'http://subdomain.domain.fr'));
        $this->assertTrue(UrlHelper::isSameDomain('http://subdomain.domain.fr/path', 'http://subdomain.domain.fr/path'));
        $this->assertTrue(UrlHelper::isSameDomain('https://subdomain.domain', 'https://subdomain.domain'));
        $this->assertTrue(UrlHelper::isSameDomain('https://subdomain.domain.fr', 'https://subdomain.domain.fr'));
        $this->assertTrue(UrlHelper::isSameDomain('https://subdomain.domain.fr/path', 'https://subdomain.domain.fr/path'));
        $this->assertTrue(UrlHelper::isSameDomain('https://subdomain.domain.fr/path', 'https://subdomain.domain.fr/path'));

        $this->assertFalse(UrlHelper::isSameDomain('http://domain1', 'http://domain2'));
        $this->assertFalse(UrlHelper::isSameDomain('http://domain1/path', 'http://domain2/path'));
        $this->assertFalse(UrlHelper::isSameDomain('https://domain1', 'http://domain2'));
    }
}
