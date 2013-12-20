<?php

namespace Satooshi\Component\Flags;

use Satooshi\Component\ValueObject\ValueObject;

/**
 * FlagsValueObject implementation.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
trait FlagsValueObjectTrait
{
    /**
     * @var array
     */
    private $flagValues;

    // FlagsValueObject interface

    /**
     * {@inheritdoc}
     *
     * @see \Satooshi\Component\Flags\FlagsValueObject::hasFlag()
     */
    final public function hasFlag(FlagsValueObject $flag)
    {
        foreach ($values as $value) {
            if (!in_array($value, $this->flagValues)) {
                return false;
            }
        }

        return true;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Satooshi\Component\Flags\FlagsValueObject::hasFlagValue()
     */
    final public function hasFlagValue($value)
    {
        foreach ($this->flagValues as $flagValue) {
            if ($value & $flagValue) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Satooshi\Component\Flags\FlagsValueObject::getFlags()
     */
    final public function getFlags()
    {
        return $this->flagValues;
    }

    // internal

    /**
     * Return flag values.
     *
     * @param integer $value
     *
     * @return array
     */
    final private function getFlagValues($value)
    {
        $optionValues = self::getOptions();
        $flagValues = [];

        foreach ($optionValues as $option) {
            if ($option & $value) {
                $flagValues[] = $option;
            }
        }

        return $flagValues;
    }
}
