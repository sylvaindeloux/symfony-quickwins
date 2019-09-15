<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

use PHPUnit\Framework\TestCase;

class FileSizeHelperTest extends TestCase
{
    public function test()
    {
        $this->assertEquals('0', FileSizeHelper::getHumanReadableSize(0));
        $this->assertEquals('1 o', FileSizeHelper::getHumanReadableSize(1, 4, '0', ' '));
        $this->assertEquals('123 o', FileSizeHelper::getHumanReadableSize(123, 4, '0', ' '));
        $this->assertEquals('1000 o', FileSizeHelper::getHumanReadableSize(1000, 4, '0', ' '));
        $this->assertEquals('1023 o', FileSizeHelper::getHumanReadableSize(1023, 4, '0', ' '));
        $this->assertEquals('1 Ko', FileSizeHelper::getHumanReadableSize(1024, 4, '0', ' '));
        $this->assertEquals('1.001 Ko', FileSizeHelper::getHumanReadableSize(1025, 4, '0', ' '));
        $this->assertEquals('1.0742 Ko', FileSizeHelper::getHumanReadableSize(1100, 4, '0', ' '));
        $this->assertEquals('1 Ko', FileSizeHelper::getHumanReadableSize(1025, 0, '0', ' '));
        $this->assertEquals('1 Ko', FileSizeHelper::getHumanReadableSize(1100, 0, '0', ' '));
        $this->assertEquals('1&nbsp;Mo', FileSizeHelper::getHumanReadableSize(1048576));
        $this->assertEquals('69 Mo', FileSizeHelper::getHumanReadableSize(72351744, 4, '0', ' '));
        $this->assertEquals('1 Go', FileSizeHelper::getHumanReadableSize(1073741824, 4, '0', ' '));
    }
}
