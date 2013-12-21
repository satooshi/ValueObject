<?php

namespace Satooshi\Component\Enum;

/**
 * @covers \Satooshi\Component\Enum\EnumObject
 * @group unit
 */
class EnumObjectTest extends \PHPUnit_Framework_TestCase
{
    // validateValue()

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testValidateValue()
    {
        $obj = Gender::createFemale();
        $obj->validateValue('X');
    }
}
