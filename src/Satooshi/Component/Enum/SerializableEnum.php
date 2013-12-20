<?php

namespace Satooshi\Component\Enum;

/**
 * Serializable interface implementaiton.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
trait SerializableEnum
{
    /**
     * {@inheritdoc}
     *
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize($this->value);
    }

    /**
     * {@inheritdoc}
     *
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        $this->value = unserialize($serialized);
    }
}
