<?php

namespace Satooshi\Component\Flags;

/**
 * Flags object implementation.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
trait FlagsObject
{
    /**
     * Private constructor.
     *
     * @param integer $value
     */
    final private function __construct($value)
    {
        $this->flagValues = $this->getFlagValues($value);
        $this->validateValue($value);
        $this->value = $value;
    }

    /**
     * Create Flags object.
     *
     * @param integer $flagValues
     *
     * @return \Satooshi\Component\Flags\FlagsObject
     */
    final public static function createFlags($flagValues)
    {
        return new static($flagValues);
    }

    /**
     * {@inheritdoc}
     *
     * @see \Satooshi\Component\Enum\EnumValueObject::validateValue()
     */
    final public function validateValue($value)
    {
        //TODO assert type is positive integer >= 0
        if (!self::isDefined($value) && !$this->hasFlagValue($value)) {
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
        $value = self::getValueOf($nameUpperCase);

        return $this->hasFlagValue($value) || $this->isSameValue($value);
    }
}
