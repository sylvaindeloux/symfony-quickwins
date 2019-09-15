<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

abstract class FileSizeHelper
{
    const SIZE_PREFIX = array('o', 'Ko', 'Mo', 'Go', 'To', 'Eo', 'Zo', 'Yo');

    public static function getHumanReadableSize($value = 0, int $decimals = 4, string $zeroValue = '0', string $separator = '&nbsp;'): string
    {
        if (0 === $value) {
            return $zeroValue;
        }

        $class = min((int) log($value, 1024), count(self::SIZE_PREFIX) - 1);

        $rawSize = sprintf("%1.{$decimals}f", $value / pow(1024, $class));

        $cleanedSize = rtrim($rawSize, 0);
        $cleanedSize = rtrim($cleanedSize, '.');

        return sprintf('%s%s%s', $cleanedSize, $separator, self::SIZE_PREFIX[$class]);
    }
}
