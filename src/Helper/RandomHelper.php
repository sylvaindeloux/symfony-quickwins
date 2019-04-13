<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

class RandomHelper
{
    public static function generateToken(): string
    {
        if (@file_exists('/dev/urandom')) {
            $randomData = file_get_contents('/dev/urandom', false, null, 0, 100);
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes(100, $strong);

            if (true === $strong && false !== $bytes) {
                $randomData = $bytes;
            }
        } else {
            $randomData = random_bytes(100);
        }

        return rtrim(strtr(base64_encode(hash('sha256', $randomData)), '+/', '-_'), '=');
    }
}
