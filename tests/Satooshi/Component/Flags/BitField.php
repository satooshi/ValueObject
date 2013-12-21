<?php

namespace Satooshi\Component\Flags;

use Satooshi\Component\Flags\FlagsValueObject;

final class BitField implements FlagsValueObject
{
    use \Satooshi\Component\Flags\Flags;

    const NONE = 0;
    const A = 1;
    const B = 2;
    const C = 4;
    const D = 8;
}
