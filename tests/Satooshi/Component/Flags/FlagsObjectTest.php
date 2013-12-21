<?php

namespace Satooshi\Component\Flags;

/**
 * @covers \Satooshi\Component\Flags\FlagsObject
 * @group unit
 */
class FlagsObjectTest extends \PHPUnit_Framework_TestCase
{
    // createFlags()

    public function testCreateFlags()
    {
        $obj = BitField::createFlags(BitField::A);

        $this->assertInstanceOf('\Satooshi\Component\Flags\BitField', $obj);
    }

    // validateValue()

    /**
     * @dataProvider provideValidValue
     */
    public function testValidateValue($validValue)
    {
        $obj = BitField::createFlags(BitField::A);

        $obj->validateValue($validValue);
    }

    /**
     * @dataProvider provideInvalidValue
     * @expectedException \InvalidArgumentException
     */
    public function testValidateValueInvalid($invalidValue)
    {
        $obj = BitField::createFlags(BitField::A);

        $obj->validateValue($invalidValue);
    }

    // is()

    public function testIs()
    {
        $obj = BitField::createFlags(BitField::A | BitField::C | BitField::NONE);

        $this->assertTrue($obj->isA(), 'is not A');
        $this->assertFalse($obj->isB(), 'is B');
        $this->assertTrue($obj->isC(), 'is not C');
        $this->assertFalse($obj->isD(), 'is D');
        $this->assertFalse($obj->isNone(), 'is NONE');
    }

    // provider

    public function provideValidValue()
    {
        return [
            [0],
            [1],
            [2],
            [3],
            [4],
            [5],
            [6],
            [7],
            [8],
            [9],
            [10],
            [11],
            [12],
            [13],
            [14],
            [15],
        ];
    }

    public function provideInvalidValue()
    {
        return [
            ['A'],
            [-1],
            [16],
            [17],
            [123456789]
        ];
    }
}
