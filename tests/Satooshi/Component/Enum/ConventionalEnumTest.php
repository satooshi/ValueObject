<?php

namespace Satooshi\Component\Enum;

/**
 * @covers \Satooshi\Component\Enum\ConventionalEnum
 * @covers \Satooshi\Component\Enum\EnumObject
 * @group unit
 */
class ConventionalEnumTest extends \PHPUnit_Framework_TestCase
{
    // __call()

    public function testCallIs()
    {
        $obj = Gender::createFemale();

        $this->assertTrue($obj->isFemale());
        $this->assertFalse($obj->isMale());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCallIsInvalidArgumentException()
    {
        $obj = Gender::createFemale();

        $obj->isRobot();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCallInvalidArgumentException()
    {
        $obj = Gender::createFemale();

        $obj->greet();
    }

    // __callStatic()

    public function testCallStaticCreate()
    {
        $obj = Gender::createMale();

        $this->assertInstanceOf('\Satooshi\Component\Enum\Gender', $obj);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCallStaticCreateInvalidArgumentException()
    {
        Gender::createRobot();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCallStaticInvalidArgumentException()
    {
        Gender::greet();
    }
}
