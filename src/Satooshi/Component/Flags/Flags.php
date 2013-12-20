<?php

namespace Satooshi\Component\Flags;

use Satooshi\Component\Enum\ConventionalEnum;
use Satooshi\Component\Enum\EnumValueObjectTrait;
use Satooshi\Component\Enum\SerializableEnum;
use Satooshi\Component\Flags\FlagsValueObjectTrait;

/**
 * Flags object.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
trait Flags
{
    use ConventionalEnum;
    use EnumValueObjectTrait;
    use FlagsObject;
    use FlagsValueObjectTrait;
    use SerializableEnum;
}
