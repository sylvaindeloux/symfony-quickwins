<?php

namespace SylvainDeloux\SymfonyQuickwins\Helper;

use PHPUnit\Framework\TestCase;

class DoctrineHelperTest extends TestCase
{
    /**
     * @covers \SylvainDeloux\SymfonyQuickwins\Helper\DoctrineHelper::makeLikeParam()
     */
    public function test()
    {
        $this->assertSame('%grou%', DoctrineHelper::makeLikeParam('grou'));
        $this->assertSame('%grou', DoctrineHelper::makeLikeParam('grou', '%%%s'));
        $this->assertSame('grou%', DoctrineHelper::makeLikeParam('grou', '%s%%'));

        $this->assertSame('%100!%%', DoctrineHelper::makeLikeParam('100%'));
        $this->assertSame('%100!%', DoctrineHelper::makeLikeParam('100%', '%%%s'));
        $this->assertSame('100!%%', DoctrineHelper::makeLikeParam('100%', '%s%%'));

        $this->assertSame('%unit!_test%', DoctrineHelper::makeLikeParam('unit_test'));
        $this->assertSame('%unit!_test', DoctrineHelper::makeLikeParam('unit_test', '%%%s'));
        $this->assertSame('unit!_test%', DoctrineHelper::makeLikeParam('unit_test', '%s%%'));

        $this->assertSame('%This is a 100!% accurate unit!_test!!%', DoctrineHelper::makeLikeParam('This is a 100% accurate unit_test!'));
        $this->assertSame('%This is a 100!% accurate unit!_test!!', DoctrineHelper::makeLikeParam('This is a 100% accurate unit_test!', '%%%s'));
        $this->assertSame('This is a 100!% accurate unit!_test!!%', DoctrineHelper::makeLikeParam('This is a 100% accurate unit_test!', '%s%%'));

        $this->assertSame('%But will it \fail? 😂%', DoctrineHelper::makeLikeParam('But will it \fail? 😂'));
        $this->assertSame('%But will it \fail? 😂', DoctrineHelper::makeLikeParam('But will it \fail? 😂', '%%%s'));
        $this->assertSame('But will it \fail? 😂%', DoctrineHelper::makeLikeParam('But will it \fail? 😂', '%s%%'));
    }
}
