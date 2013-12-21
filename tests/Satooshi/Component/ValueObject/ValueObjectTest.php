<?php

namespace Satooshi\Component\ValueObject;

/**
 * @covers \Satooshi\Component\ValueObject\ValueObjectTrait
 * @group unit
 */
class ValueObjectTest extends \PHPUnit_Framework_TestCase
{
    // isSameValueAs()

    public function testIsSameValueAsTrue()
    {
        $value1 = 'aaa';
        $value2 = 'bbb';

        $obj   = new SampleValueObject($value1, $value2);
        $other = new SampleValueObject($value1, $value2);

        $this->assertTrue($obj->isSameValueAs($other));
        $this->assertTrue($other->isSameValueAs($obj));
    }

    public function testIsSameValueAsFalse()
    {
        $value1 = 'aaa';
        $value2 = 'bbb';
        $value3 = 'ccc';

        $obj   = new SampleValueObject($value1, $value2);
        $other = new SampleValueObject($value1, $value3);

        $this->assertFalse($obj->isSameValueAs($other));
        $this->assertFalse($other->isSameValueAs($obj));
    }

    // serialize()
    // unserialize()

    public function testSerializable()
    {
        $value1 = 'aaa';
        $value2 = 'bbb';

        $obj          = new SampleValueObject($value1, $value2);
        $serialized   = serialize($obj);
        $unserialized = unserialize($serialized);

        $this->assertTrue($obj->isSameValueAs($unserialized));
    }
}
