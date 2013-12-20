<?php

namespace Satooshi\Component\Enum;

use Satooshi\Component\ValueObject\ValueObject;

/**
 * Enum ValueObject interface.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
interface EnumValueObject extends ValueObject
{
    /**
     * Compare ordinal to other Enum object.
     *
     * @param EnumValueObject $other
     *
     * @return integer -1, 0, 1
     */
    public function compareTo(EnumValueObject $other);

    /**
     * Return value of the enum object.
     *
     * @return integer|string
     */
    public function getValue();

    /**
     * Return name of the enum object.
     *
     * @return string
     */
    public function getName();

    /**
     * Return ordinal cord.
     *
     * @return integer
     */
    public function getOrdinal();

    /**
     * Validate value.
     *
     * @param integer|string $value
     *
     * @return void
     *
     * @throws \InvalidArgumentException Throws if the given value is not valid.
     */
    public function validateValue($value);
}
