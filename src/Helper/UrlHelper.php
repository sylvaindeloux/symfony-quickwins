<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

abstract class UrlHelper
{
    public static function isHttps(string $url): bool
    {
        $url = parse_url($url);

        return 'https' === $url['scheme'];
    }

    public static function isSameDomain(string $url1, string $url2): bool
    {
        $url1Data = parse_url($url1);
        $url2Data = parse_url($url2);

        return $url1Data['host'] === $url2Data['host'];
    }
}
