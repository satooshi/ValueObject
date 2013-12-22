<?php

namespace Satooshi\Component\ValueObject;

/**
 * ValueObject interface implementation.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
trait ValueObjectTrait
{
    /**
     * Return whether other class is the same as this object.
     *
     * @param ValueObject $other
     *
     * @return boolean
     */
    final private function isValidType(ValueObject $other)
    {
        return get_called_class() === get_class($other);
    }
}
