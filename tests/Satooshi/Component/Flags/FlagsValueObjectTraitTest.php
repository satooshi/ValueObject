<?php

namespace Satooshi\Component\Flags;

/**
 * @covers \Satooshi\Component\Flags\FlagsValueObjectTrait
 * @group unit
 */
class FlagsValueObjectTraitTest extends \PHPUnit_Framework_TestCase
{
    // hasFlag()

    public function testHasFlag()
    {
        $obj = BitField::createFlags(BitField::A | BitField::B);
        $flagA = BitField::createFlags(BitField::A);
        $flagB = BitField::createFlags(BitField::B);
        $flagC = BitField::createFlags(BitField::C);
        $flagD = BitField::createFlags(BitField::D);
        $flagNone = BitField::createFlags(BitField::NONE);
        $flagAB = BitField::createFlags(BitField::A | BitField::B);

        $this->assertTrue($obj->hasFlag($flagA), 'not have A');
        $this->assertTrue($obj->hasFlag($flagB), 'not have B');
        $this->assertTrue($obj->hasFlag($flagAB), 'not have A and B');

        $this->assertFalse($obj->hasFlag($flagC), 'have C');
        $this->assertFalse($obj->hasFlag($flagD), 'have D');

        //TODO fix me!
        //$this->assertFalse($obj->hasFlag($flagNone), 'have NONE');
    }

    // hasFlagValue()

    public function testHasFlagValue()
    {
        $obj = BitField::createFlags(BitField::A | BitField::C);

        $this->assertTrue($obj->hasFlagValue(BitField::A));
        $this->assertTrue($obj->hasFlagValue(BitField::C));

        $this->assertFalse($obj->hasFlagValue(BitField::B));
        $this->assertFalse($obj->hasFlagValue(BitField::D));
        $this->assertFalse($obj->hasFlagValue(BitField::NONE));
    }

    // getFlags()

    public function testGetFlags()
    {
        $obj = BitField::createFlags(BitField::A | BitField::C);

        $this->assertSame([BitField::A, BitField::C], $obj->getFlags());
    }
}
