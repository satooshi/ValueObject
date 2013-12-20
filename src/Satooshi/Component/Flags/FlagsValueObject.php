<?php

namespace Satooshi\Component\Flags;

use Satooshi\Component\Enum\EnumValueObject;
use Satooshi\Component\ValueObject\ValueObject;

/**
 * Flags ValueObject interface.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
interface FlagsValueObject extends EnumValueObject
{
    /**
     * Return whether the given Flags object is set to this object at least one.
     *
     * @param ValueObject $flag
     *
     * @return boolean
     */
    public function hasFlag(FlagsValueObject $flag);

    /**
     * Return whether the Flags object has the given flag value.
     *
     * @param integer $value
     *
     * @return boolean
     */
    public function hasFlagValue($value);

    /**
     * Return flag values.
     *
     * @return array
     */
    public function getFlags();
}
