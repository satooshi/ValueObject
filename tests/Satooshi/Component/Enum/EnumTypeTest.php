<?php

namespace Satooshi\Component\Enum;

/**
 * @covers \Satooshi\Component\Enum\EnumType
 * @group unit
 */
class EnumTypeTest extends \PHPUnit_Framework_TestCase
{
    // getOptions()

    public function testGetOptions()
    {
        $options = Gender::getOptions();

        $this->assertSame(['MALE' => Gender::MALE, 'FEMALE' => Gender::FEMALE], $options);
    }

    // getValues()

    public function testGetValues()
    {
        $values = Gender::getValues();

        $this->assertSame([Gender::MALE, Gender::FEMALE], $values);
    }

    // getNames()

    public function testGetNames()
    {
        $values = Gender::getNames();

        $this->assertSame(['MALE', 'FEMALE'], $values);
    }

    // isDefined()

    public function testIsDefinedTrue()
    {
        $this->assertTrue(Gender::isDefined(Gender::MALE));
        $this->assertTrue(Gender::isDefined(Gender::FEMALE));
    }

    public function testIsDefinedFalse()
    {
        $this->assertFalse(Gender::isDefined('X'));
    }

    // isDefinedName()

    public function testIsDefinedNameTrue()
    {
        $this->assertTrue(Gender::isDefinedName('MALE'));
        $this->assertTrue(Gender::isDefinedName('FEMALE'));
    }

    public function testIsDefinedNameFalse()
    {
        $this->assertFalse(Gender::isDefinedName('ROBOT'));
    }

    // getValueOf()

    public function testGetValueOf()
    {
        $this->assertEquals(Gender::MALE, Gender::getValueOf('MALE'));
        $this->assertEquals(Gender::FEMALE, Gender::getValueOf('FEMALE'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetValueOfInvalidArgumentException()
    {
        Gender::getValueOf('ROBOT');
    }

    // getNameOf()

    public function testGetNameOf()
    {
        $this->assertEquals('MALE', Gender::getNameOf(Gender::MALE));
        $this->assertEquals('FEMALE', Gender::getNameOf(Gender::FEMALE));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNameOfInvalidArgumentException()
    {
        Gender::getNameOf('X');
    }

    // getOrdinalOf()

    public function testGetOrdinalOf()
    {
        $this->assertEquals(0, Gender::getOrdinalOf(Gender::MALE));
        $this->assertEquals(1, Gender::getOrdinalOf(Gender::FEMALE));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetOrdinalOfInvalidArgumentException()
    {
        Gender::getOrdinalOf('X');
    }

    // getOrdinalOfName

    public function testGetOrdinalOfName()
    {
        $this->assertEquals(0, Gender::getOrdinalOfName('MALE'));
        $this->assertEquals(1, Gender::getOrdinalOfName('FEMALE'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetOrdinalOfNameInvalidArgumentException()
    {
        Gender::getOrdinalOfName('ROBOT');
    }
}
