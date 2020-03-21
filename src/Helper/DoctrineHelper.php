<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

abstract class DoctrineHelper
{
    public static function makeLikeParam(string $search, string $pattern = '%%%s%%'): string
    {
        $sanitizeLikeValue = function (string $search): string {
            $pattern = sprintf('/([%s])/', implode('', array('\\!', '\%', '\_')));

            return preg_replace($pattern, '!$0', $search);
        };

        return sprintf($pattern, $sanitizeLikeValue($search));
    }
}
