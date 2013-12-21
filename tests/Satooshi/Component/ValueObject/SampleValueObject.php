<?php

namespace Satooshi\Component\ValueObject;

use Satooshi\Component\ValueObject\ValueObject;

final class SampleValueObject implements ValueObject
{
    use \Satooshi\Component\ValueObject\ValueObjectTrait;

    private $value1;
    private $value2;

    public function __construct($value1, $value2)
    {
        $this->value1 = $value1;
        $this->value2 = $value2;
    }

    public function isSameValueAs(ValueObject $other)
    {
        if (!$this->isValidateType($other)) {
            return false;
        }

        if ($this->value1 !== $other->value1) {
            return false;
        }

        if ($this->value2 !== $other->value2) {
            return false;
        }

        return true;
    }

    public function serialize()
    {
        return serialize([$this->value1, $this->value2]);
    }

    public function unserialize($serialized)
    {
        list($this->value1, $this->value2) = unserialize($serialized);
    }
}
