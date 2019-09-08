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
}
