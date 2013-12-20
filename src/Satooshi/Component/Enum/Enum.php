<?php

namespace Satooshi\Component\Enum;

/**
 * Enum object.
 *
 * Require EnumValueObject inteface implementation.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
trait Enum
{
    use ConventionalEnum;
    use EnumObject;
    use EnumValueObjectTrait;
    use SerializableEnum;
}
