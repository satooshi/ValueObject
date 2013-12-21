<?php

namespace Satooshi\Component\ValueObject;

/**
 * PHP implementation of org.apache.commons.lang.builder.EqualsBuilder
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
class EqualsBuilder
{
    /**
     * @var boolean
     */
    private $isEquals = true;

    /**
     * Test if two arguments are equal.
     *
     * @param mixed $lhs
     * @param mixed $rhs
     *
     * @return self
     */
    public function append($lhs, $rhs)
    {
        if ($this->isEquals === false) {
            return $this;
        }

        if ($lhs === $rhs) {
            return $this;
        }

        if ($lhs === null || $rhs === null) {
            $this->isEquals = false;

            return $this;
        }

        $this->isEquals = false;

        return $this;
    }

    // accessor

    /**
     * Return isEquals.
     *
     * @return boolean
     */
    public function isEquals()
    {
        return $this->isEquals;
    }

    /**
     * Set isEquals.
     *
     * @param boolean $isEquals
     *
     * @return void
     */
    public function setEquals($isEquals)
    {
        $this->isEquals = $isEquals;

        return $this;
    }
}
