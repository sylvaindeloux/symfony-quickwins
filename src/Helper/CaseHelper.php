<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

abstract class CaseHelper
{
    public static function convertSnakeCaseToPascalCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return preg_replace_callback('/(^|_|\.)+(.)/', function (array $matches) {
            return ('.' === $matches[1] ? '_' : '') . strtoupper($matches[2]);
        }, $value);
    }

    public static function convertSnakeCaseToKebabCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return str_replace('_', '-', strtolower($value));
    }

    public static function convertSnakeCaseToCamelCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return lcfirst(self::convertSnakeCaseToPascalCase($value));
    }

    public static function convertKebabCaseToSnakeCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return str_replace('-', '_', strtolower($value));
    }

    public static function convertKebabCaseToPascalCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return preg_replace_callback('/(^|-|\.)+(.)/', function (array $matches) {
            return ('.' === $matches[1] ? '-' : '') . strtoupper($matches[2]);
        }, $value);
    }

    public static function convertKebabCaseToCamelCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return lcfirst(self::convertKebabCaseToPascalCase($value));
    }

    public static function convertPascalCaseToSnakeCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return strtolower(preg_replace('/[A-Z]/', '_\\0', lcfirst($value)));
    }

    public static function convertPascalCaseToKebabCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return strtolower(preg_replace('/[A-Z]/', '-\\0', lcfirst($value)));
    }

    public static function convertPascalCaseToCamelCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return lcfirst($value);
    }

    public static function convertCamelCaseToSnakeCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return strtolower(preg_replace('/[A-Z]/', '_\\0', $value));
    }

    public static function convertCamelCaseToKebabCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return strtolower(preg_replace('/[A-Z]/', '-\\0', $value));
    }

    public static function convertCamelCaseToPascalCase(string $value = null): ?string
    {
        if (null === $value) {
            return null;
        }

        $value = trim($value);

        if ('' === $value) {
            return '';
        }

        return ucfirst($value);
    }
}
