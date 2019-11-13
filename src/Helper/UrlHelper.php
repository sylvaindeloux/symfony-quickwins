<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

abstract class UrlHelper
{
    public static function isHttps(string $url): bool
    {
        $url = parse_url($url);

        return 'https' === $url['scheme'];
    }
}
