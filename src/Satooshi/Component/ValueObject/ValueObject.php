<?php

namespace Satooshi\Component\ValueObject;

/**
 * ValueObject interface.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
interface ValueObject extends \Serializable
{
    /**
     * Return whether other ValueObject corresponds to the same value as this object.
     *
     * @param ValueObject $other
     *
     * @return boolean
     */
    public function isSameValueAs(ValueObject $other);
}
