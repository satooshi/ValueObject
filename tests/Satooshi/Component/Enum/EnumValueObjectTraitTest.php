<?php

namespace Satooshi\Component\Enum;

/**
 * @covers \Satooshi\Component\Enum\EnumValueObjectTrait
 * @group unit
 */
class EnumValueObjectTraitTest extends \PHPUnit_Framework_TestCase
{
    // __invoke()
    // __toString()
    // __set()
    // __get()
    // isSameValueAs()

    public function testIsSameValueAsTrue()
    {
        $obj   = Gender::createMale();
        /* @var $obj \Satooshi\Component\Enum\Gender */
        $other = Gender::createMale();
        /* @var $other \Satooshi\Component\Enum\Gender */

        $this->assertTrue($obj->isSameValueAs($other));
        $this->assertTrue($other->isSameValueAs($obj));
    }

    public function testIsSameValueAsFalse()
    {
        $obj   = Gender::createMale();
        /* @var $obj \Satooshi\Component\Enum\Gender */
        $other = Gender::createFemale();
        /* @var $other \Satooshi\Component\Enum\Gender */

        $this->assertFalse($obj->isSameValueAs($other));
        $this->assertFalse($other->isSameValueAs($obj));
    }

    // compareTo()
    // getOrdinal()
    // getValue()

    public function testGetValue()
    {
        $obj = Gender::createMale();

        $this->assertSame(Gender::MALE, $obj->getValue());
    }

    // getName()
}
