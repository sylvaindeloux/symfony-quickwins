<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

class DateTimeHelper
{
    protected $locale;

    public function __construct()
    {
        $this->locale = \Locale::getDefault();
    }

    public function localize($data, string $locale = null, string $dateFormat = \IntlDateFormatter::NONE, string $timeFormat = \IntlDateFormatter::NONE): string
    {
        $dateTime = $this->prepareDateTime($data);
        $formatter = new \IntlDateFormatter($locale ?? $this->locale, $dateFormat, $timeFormat);

        return $formatter->format($dateTime);
    }

    public function prepareDateTime($data): \DateTime
    {
        if ($data instanceof \DateTime) {
            return $data;
        }

        if ($data instanceof \DateTimeImmutable) {
            $dateTime = new \DateTime(null, $data->getTimezone());
            $dateTime->setTimestamp($data->getTimestamp());

            return $dateTime;
        }

        if (is_numeric($data)) {
            $data = (int) $data;
        }

        if (is_string($data)) {
            $data = strtotime($data);
        }

        $dateTime = new \DateTime();
        $dateTime->setTimestamp($data);

        return $dateTime;
    }
}
