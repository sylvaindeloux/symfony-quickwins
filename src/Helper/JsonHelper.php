<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

class JsonHelper
{
    public static function isJson($data): bool
    {
        if (!is_string($data)) {
            return false;
        }

        $data = trim($data);

        if ('' === $data) {
            return false;
        }

        if ('{' !== substr($data, 0, 1)) {
            return false;
        }

        if (false === json_decode($data)) {
            return false;
        }

        return JSON_ERROR_NONE === json_last_error();
    }
}
