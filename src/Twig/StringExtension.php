<?php

namespace SylvainDeloux\SymfonyQuickwins\Twig;

use SylvainDeloux\SymfonyQuickwins\Helper\FileSizeHelper;
use SylvainDeloux\SymfonyQuickwins\Helper\StringHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class StringExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return array(
            new TwigFunction('human_readable_size', array($this, 'getHumanReadableSize')),
        );
    }

    public function getFilters()
    {
        return array(
            new TwigFilter('limit_length', array($this, 'limitStringLength')),
        );
    }

    public function getHumanReadableSize($value = 0, int $decimals = 4, string $zeroValue = '0', string $separator = '&nbsp;'): string
    {
        return FileSizeHelper::getHumanReadableSize($value, $decimals, $zeroValue, $separator);
    }

    public function limitStringLength(string $value, int $limit = 100, string $end = '…'): string
    {
        return StringHelper::limit($value, $limit, $end);
    }
}
