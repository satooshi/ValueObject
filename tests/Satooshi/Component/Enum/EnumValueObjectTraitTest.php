<?php

namespace Satooshi\Component\Enum;

/**
 * @covers \Satooshi\Component\Enum\EnumValueObjectTrait
 * @group unit
 */
class EnumValueObjectTraitTest extends \PHPUnit_Framework_TestCase
{
    // __invoke()

    public function testInvoke()
    {
        $obj = Gender::createMale();

        $this->assertEquals('M', $obj());
    }

    // __toString()

    public function testToString()
    {
        $obj = Gender::createMale();

        $this->assertEquals('M', "$obj");
    }

    // __set()

    /**
     * @expectedException \RuntimeException
     */
    public function testSet()
    {
        $obj = Gender::createMale();

        $obj->undefinedProp = 'value';
    }

    // __get()

    /**
     * @expectedException \RuntimeException
     */
    public function testGet()
    {
        $obj = Gender::createMale();

        $obj->undefinedProp;
    }

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

    public function testCompareTo()
    {
        $obj   = Gender::createMale();
        $other = Gender::createFemale();

        $this->assertEquals(-1, $obj->compareTo($other));
        $this->assertEquals(1, $other->compareTo($obj));
        $this->assertEquals(0, $obj->compareTo($obj));
    }

    // getOrdinal()

    public function testGetOrdinal0()
    {
        $obj = Gender::createMale();

        $this->assertEquals(0, $obj->getOrdinal());
    }

    public function testGetOrdinal1()
    {
        $obj = Gender::createFemale();

        $this->assertEquals(1, $obj->getOrdinal());
    }

    // getValue()

    public function testGetValue()
    {
        $obj = Gender::createMale();

        $this->assertSame(Gender::MALE, $obj->getValue());
    }

    // getName()

    public function testGetName()
    {
        $obj = Gender::createMale();

        $this->assertEquals('MALE', $obj->getName());
    }
}
