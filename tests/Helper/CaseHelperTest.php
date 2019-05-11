<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

use PHPUnit\Framework\TestCase;

class CaseHelperTest extends TestCase
{
    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertSnakeCaseToPascalCase
     */
    public function testConvertSnakeCaseToPascalCase()
    {
        $this->assertNull(CaseHelper::convertSnakeCaseToPascalCase(null));
        $this->assertSame('', CaseHelper::convertSnakeCaseToPascalCase(''));
        $this->assertSame('SnakeCaseConvertToPascalCase', CaseHelper::convertSnakeCaseToPascalCase('snake_case_convert_to_pascal_case'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertSnakeCaseToKebabCase
     */
    public function testConvertSnakeCaseToKebabCase()
    {
        $this->assertNull(CaseHelper::convertSnakeCaseToKebabCase(null));
        $this->assertSame('', CaseHelper::convertSnakeCaseToKebabCase(''));
        $this->assertSame('snake-case-convert-to-kebab-case', CaseHelper::convertSnakeCaseToKebabCase('snake_case_convert_to_kebab_case'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertSnakeCaseToCamelCase
     */
    public function testConvertSnakeCaseToCamelCase()
    {
        $this->assertNull(CaseHelper::convertSnakeCaseToCamelCase(null));
        $this->assertSame('', CaseHelper::convertSnakeCaseToCamelCase(''));
        $this->assertSame('snakeCaseConvertToCamelCase', CaseHelper::convertSnakeCaseToCamelCase('snake_case_convert_to_camel_case'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertKebabCaseToSnakeCase
     */
    public function testConvertKebabCaseToSnakeCase()
    {
        $this->assertNull(CaseHelper::convertKebabCaseToSnakeCase(null));
        $this->assertSame('', CaseHelper::convertKebabCaseToSnakeCase(''));
        $this->assertSame('kebab_case_convert_to_snake_case', CaseHelper::convertKebabCaseToSnakeCase('kebab-case-convert-to-snake-case'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertKebabCaseToPascalCase
     */
    public function testConvertKebabCaseToPascalCase()
    {
        $this->assertNull(CaseHelper::convertKebabCaseToPascalCase(null));
        $this->assertSame('', CaseHelper::convertKebabCaseToPascalCase(''));
        $this->assertSame('KebabCaseConvertToPascalCase', CaseHelper::convertKebabCaseToPascalCase('kebab-case-convert-to-pascal-case'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertKebabCaseToCamelCase
     */
    public function testConvertKebabCaseToCamelCase()
    {
        $this->assertNull(CaseHelper::convertKebabCaseToCamelCase(null));
        $this->assertSame('', CaseHelper::convertKebabCaseToCamelCase(''));
        $this->assertSame('kebabCaseConvertToCamelCase', CaseHelper::convertKebabCaseToCamelCase('kebab-case-convert-to-camel-case'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertPascalCaseToSnakeCase
     */
    public function testConvertPascalCaseToSnakeCase()
    {
        $this->assertNull(CaseHelper::convertPascalCaseToSnakeCase(null));
        $this->assertSame('', CaseHelper::convertPascalCaseToSnakeCase(''));
        $this->assertSame('pascal_case_convert_to_snake_case', CaseHelper::convertPascalCaseToSnakeCase('PascalCaseConvertToSnakeCase'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertPascalCaseToKebabCase
     */
    public function testConvertPascalCaseToKebabCase()
    {
        $this->assertNull(CaseHelper::convertPascalCaseToKebabCase(null));
        $this->assertSame('', CaseHelper::convertPascalCaseToKebabCase(''));
        $this->assertSame('pascal-case-convert-to-kebab-case', CaseHelper::convertPascalCaseToKebabCase('PascalCaseConvertToKebabCase'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertPascalCaseToCamelCase
     */
    public function testConvertPascalCaseToCamelCase()
    {
        $this->assertNull(CaseHelper::convertPascalCaseToCamelCase(null));
        $this->assertSame('', CaseHelper::convertPascalCaseToCamelCase(''));
        $this->assertSame('pascalCaseConvertToCamelCase', CaseHelper::convertPascalCaseToCamelCase('PascalCaseConvertToCamelCase'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertCamelCaseToSnakeCase
     */
    public function testConvertCamelCaseToSnakeCase()
    {
        $this->assertNull(CaseHelper::convertCamelCaseToSnakeCase(null));
        $this->assertSame('', CaseHelper::convertCamelCaseToSnakeCase(''));
        $this->assertSame('camel_case_convert_to_snake_case', CaseHelper::convertCamelCaseToSnakeCase('camelCaseConvertToSnakeCase'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertCamelCaseToKebabCase
     */
    public function testConvertCamelCaseToKebabCase()
    {
        $this->assertNull(CaseHelper::convertCamelCaseToKebabCase(null));
        $this->assertSame('', CaseHelper::convertCamelCaseToKebabCase(''));
        $this->assertSame('camel-case-convert-to-kebab-case', CaseHelper::convertCamelCaseToKebabCase('camelCaseConvertToKebabCase'));
    }

    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\CaseHelper::convertCamelCaseToPascalCase
     */
    public function testConvertCamelCaseToPascalCase()
    {
        $this->assertNull(CaseHelper::convertCamelCaseToPascalCase(null));
        $this->assertSame('', CaseHelper::convertCamelCaseToPascalCase(''));
        $this->assertSame('CamelCaseConvertToPascalCase', CaseHelper::convertCamelCaseToPascalCase('camelCaseConvertToPascalCase'));
    }
}
