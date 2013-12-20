<?php

namespace Satooshi\Component\Enum;

/**
 * Enum object implementation.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
trait EnumObject
{
    /**
     * Private constructor.
     *
     * @param integer|string $value
     */
    final private function __construct($value)
    {
        $this->validateValue($value);

        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Satooshi\Component\Enum\EnumValueObject::validateValue()
     */
    final public function validateValue($value)
    {
        if (!self::isDefined($value)) {
            throw new \InvalidArgumentException(sprintf('value is not defined: %s', $value));
        }
    }

    /**
     * Return whether the constant name corresponds to the same value as this object.
     *
     * @param string $name CamelCase constant name.
     *
     * @return boolean
     */
    final private function is($name)
    {
        $nameUpperCase = self::toUpperCaseName($name);

        return $this->isSameValue(self::getValueOf($nameUpperCase));
    }
}
