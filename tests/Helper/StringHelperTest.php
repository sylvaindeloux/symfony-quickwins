<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

use PHPUnit\Framework\TestCase;

class StringHelperTest extends TestCase
{
    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\StringHelper::limit()
     */
    public function testLimit()
    {
        $this->assertSame('Lorem ipsu…', StringHelper::limit('Lorem ipsum sit dolor amet', 10));
        $this->assertSame('Lorem ipsu.', StringHelper::limit('Lorem ipsum sit dolor amet', 10, '.'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\StringHelper::decodeHtmlEmojis()
     */
    public function testDecodeHtmlEmojis()
    {
        $this->assertSame('Lorem ipsum 😍 sit dolor amet', StringHelper::decodeHtmlEmojis('Lorem ipsum &#55357;&#56845; sit dolor amet'));
    }
}
