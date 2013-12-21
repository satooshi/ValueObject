<?php

namespace Satooshi\Component\ValueObject;

/**
 * @covers \Satooshi\Component\ValueObject\EqualsBuilder
 * @group unit
 */
class EqualsBuilderTest extends \PHPUnit_Framework_TestCase
{
    // append()

    public function testAppendIfisEqualsFalseBeforeAppend()
    {
        $lhs = 'aa';
        $rhs = 'aa';

        $obj = new EqualsBuilder();

        $isEquals = $obj
        ->setEquals(false)
        ->append($lhs, $rhs)
        ->isEquals();

        $this->assertFalse($isEquals);
    }

    public function testAppendIfSameValues()
    {
        $lhs = 'aa';
        $rhs = 'aa';

        $obj = new EqualsBuilder();

        $isEquals = $obj
        ->append($lhs, $rhs)
        ->isEquals();

        $this->assertTrue($isEquals);
    }

    public function testAppendIfNotSameValues()
    {
        $lhs = 'aa';
        $rhs = 'ab';

        $obj = new EqualsBuilder();

        $isEquals = $obj
        ->append($lhs, $rhs)
        ->isEquals();

        $this->assertFalse($isEquals);
    }

    public function testAppendIfLeftHandSideNull()
    {
        $lhs = null;
        $rhs = 'aa';

        $obj = new EqualsBuilder();

        $isEquals = $obj
        ->append($lhs, $rhs)
        ->isEquals();

        $this->assertFalse($isEquals);
    }

    public function testAppendIfRightHandSideNull()
    {
        $lhs = 'aa';
        $rhs = null;

        $obj = new EqualsBuilder();

        $isEquals = $obj
        ->append($lhs, $rhs)
        ->isEquals();

        $this->assertFalse($isEquals);
    }

    // isEquals()

    public function testIsEquals()
    {
        $obj = new EqualsBuilder();

        $this->assertTrue($obj->isEquals());
    }

    // setEquals()

    public function testSetEquals()
    {
        $obj = new EqualsBuilder();

        $obj->setEquals(false);

        $this->assertFalse($obj->isEquals());
    }
}
