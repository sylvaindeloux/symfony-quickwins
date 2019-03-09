<?php

namespace SylvainDeloux\SymfonyQuickwins\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DateTimeFilterExtension extends AbstractExtension
{
    const FORMAT_SHORT = 'short';
    const FORMAT_LONG = 'long';

    protected $locale;

    public function __construct()
    {
        $this->locale = \Locale::getDefault();
    }

    public function getFilters()
    {
        return array(
            new TwigFilter('localize_date', array($this, 'localizeDate')),
            new TwigFilter('localize_time', array($this, 'localizeTime')),
            new TwigFilter('localize_datetime', array($this, 'localizeDateTime')),
        );
    }

    public function localizeDate(\DateTime $date, string $locale = null, string $format = null): string
    {
        $formatter = new \IntlDateFormatter($locale ?? $this->locale, $this->resolveFormat($format), \IntlDateFormatter::NONE);

        return $formatter->format($date);
    }

    public function localizeTime(\DateTime $date, string $locale = null, string $format = null): string
    {
        $formatter = new \IntlDateFormatter($locale ?? $this->locale, \IntlDateFormatter::NONE, $this->resolveFormat($format));

        return $formatter->format($date);
    }

    public function localizeDateTime(\DateTime $date, string $locale = null, string $format = null): string
    {
        $formatter = new \IntlDateFormatter($locale ?? $this->locale, $this->resolveFormat($format), $this->resolveFormat($format));

        return $formatter->format($date);
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
