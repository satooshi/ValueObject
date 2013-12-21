<?php

namespace Satooshi\Component\Enum;

/**
 * @covers \Satooshi\Component\Enum\ConventionalEnum
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

    // __callStatic()

    public function testCallStaticCreate()
    {
        $obj = Gender::createMale();

        $this->assertInstanceOf('\Satooshi\Component\Enum\Gender', $obj);
    }

}
