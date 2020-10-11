<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

abstract class StringHelper
{
    public static function limit(string $value, int $limit = 100, string $end = '…'): string
    {
        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }

        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
    }

    public static function decodeHtmlEmojis(string $value): string
    {
        return preg_replace_callback('/&#(.{5});&#(.{5});/', function(array $matches) {
            return iconv('UTF-16BE', 'UTF-8', hex2bin(dechex($matches[1]).dechex($matches[2])));
        }, $value);
    }
}
