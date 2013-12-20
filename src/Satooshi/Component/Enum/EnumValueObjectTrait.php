<?php

namespace Satooshi\Component\Enum;

use Satooshi\Component\ValueObject\ValueObject;
use Satooshi\Component\ValueObject\ValueObjectTrait;

/**
 * ValueObject and EnumValueObject interface implementation.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
trait EnumValueObjectTrait
{
    use EnumType;
    use ValueObjectTrait;

    /**
     * @var integer|string
     */
    private $value;

    /**
     * Same implementation as getValue() for easy syntax.
     *
     *     $v = $v1->getValue() | $v2->getValue();
     *
     * is equal to
     *
     *     $v = $v1() | $v2();
     *
     * @param mixed $arg
     *
     * @return integer|string
     */
    final public function __invoke($arg)
    {
        return $this->value;
    }

    //TODO should be const name?
    public function __toString()
    {
        return (string) $this->value;
    }

    // disable magic method

    /**
     * Disable __set() magic method.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    final public function __set($name, $value)
    {
        throw new \RuntimeException(sprintf('Cannot set undefined property %s to %s', $name, get_called_class()));
    }

    /**
     * Disable __get() magic method.
     *
     * @param string $name
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    final public function __get($name)
    {
        throw new \RuntimeException(sprintf('Cannot get undefined property %s from %s', $name, get_called_class()));
    }

    // ValueObject interface

    /**
     * {@inheritdoc}
     *
     * @see \Satooshi\Component\ValueObject\ValueObject::isSameValueAs()
     */
    final public function isSameValueAs(ValueObject $other)
    {
        return $this->isValidateType($other) && $this->isSameValue($other->getValue());
    }

    /**
     * Return whether the value is the same as this object.
     *
     * @param integer|string $value
     *
     * @return boolean
     */
    final private function isSameValue($value)
    {
        return $this->value === $value;
    }

    // EnumValueObject interface

    /**
     * {@inheritdoc}
     *
     * @see \Satooshi\Component\Enum\EnumValueObject::compareTo()
     */
    final public function compareTo(EnumValueObject $other)
    {
        $thisOrdinal  = $this->getOrdinal();
        $otherOrdinal = $other->getOrdinal();

        if ($thisOrdinal === $otherOrdinal) {
            return 0;
        }

        return $thisOrdinal > $otherOrdinal ? 1 : -1;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Satooshi\Component\Enum\EnumValueObject::getOrdinal()
     */
    final public function getOrdinal()
    {
        return self::getOrdinalOf($this->value);
    }

    /**
     * {@inheritdoc}
     *
     * @see \Satooshi\Component\Enum\EnumValueObject::getValue()
     */
    final public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Satooshi\Component\Enum\EnumValueObject::getName()
     */
    final public function getName()
    {
        return self::getNameOf($this->value);
    }
}
