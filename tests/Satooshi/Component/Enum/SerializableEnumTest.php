<?php

namespace Satooshi\Component\Enum;

/**
 * @covers \Satooshi\Component\Enum\SerializableEnum
 * @group unit
 */
class SerializableEnumTest extends \PHPUnit_Framework_TestCase
{
    // serialize()
    // unserialize()

    public function testSerializable()
    {
        $obj          = Gender::createMale();
        $serialized   = serialize($obj);
        $unserialized = unserialize($serialized);

        $this->assertTrue($obj->isSameValueAs($unserialized));
    }
}
