<?php

namespace SylvainDeloux\SymfonyQuickwins\Twig;

use SylvainDeloux\SymfonyQuickwins\Helper\DateTimeHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DateTimeFilterExtension extends AbstractExtension
{
    const FORMAT_SHORT = 'short';
    const FORMAT_LONG = 'long';

    protected $dateTimeHelper;

    public function __construct(DateTimeHelper $dateTimeHelper)
    {
        $this->dateTimeHelper = $dateTimeHelper;
    }

    public function getFilters()
    {
        return array(
            new TwigFilter('localize_date', array($this, 'localizeDate')),
            new TwigFilter('localize_time', array($this, 'localizeTime')),
            new TwigFilter('localize_datetime', array($this, 'localizeDateTime')),
        );
    }

    public function localizeDate($data, string $locale = null, string $format = null): string
    {
        return $this->dateTimeHelper->localize($data, $locale, $this->resolveFormat($format));
    }

    public function localizeTime($data, string $locale = null, string $format = null): string
    {
        return $this->dateTimeHelper->localize($data, $locale, \IntlDateFormatter::NONE, $this->resolveFormat($format));
    }

    public function localizeDateTime($data, string $locale = null, string $format = null): string
    {
        return $this->dateTimeHelper->localize($data, $locale, $this->resolveFormat($format), $this->resolveFormat($format));
    }

    protected function resolveFormat(string $format = null): int
    {
        switch ($format) {
            case self::FORMAT_SHORT:
                return \IntlDateFormatter::SHORT;

            case self::FORMAT_LONG:
                return \IntlDateFormatter::LONG;

            default:
                return \IntlDateFormatter::MEDIUM;
        }
    }
}
