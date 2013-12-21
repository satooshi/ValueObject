<?php

namespace Satooshi\Component\Enum;

/**
 * Static method implementations of Enum trait.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
trait EnumType
{
    /**
     * Enum list.
     *
     * @var array
     */
    private static $options;

    /**
     * Return enum list.
     *
     * @return array
     */
    final public static function getOptions()
    {
        self::initOptions();

        return self::$options;
    }

    /**
     * Return enum values.
     *
     * @return array
     */
    final public static function getValues()
    {
        self::initOptions();

        return array_values(self::$options);
    }

    /**
     * Return enum names.
     *
     * @return array
     */
    final public static function getNames()
    {
        self::initOptions();

        return array_keys(self::$options);
    }

    /**
     * Return whether the value is defined in the class.
     *
     * @param integer|string $value
     *
     * @return boolean
     */
    final public static function isDefined($value)
    {
        self::initOptions();

        return in_array($value, self::$options, true);
    }

    /**
     * Return whether the name is defined in the class.
     *
     * @param string $name Enum constant name.
     *
     * @return boolean
     */
    final public static function isDefinedName($name)
    {
        self::initOptions();

        return isset(self::$options[$name]);
    }

    /**
     * Return the value of name.
     *
     * @param string $name
     *
     * @return integer|string
     *
     * @throws \InvalidArgumentException Throws if the given name is not defined.
     */
    final public static function getValueOf($name)
    {
        if (self::isDefinedName($name)) {
            return self::$options[$name];
        }

        throw new \InvalidArgumentException(sprintf('name (%s) is not defined in %s', $name, get_called_class()));
    }

    /**
     * Return the name of value.
     *
     * @param integer|string $value
     *
     * @return string
     *
     * @throws \InvalidArgumentException Throws if the given value is not defined.
     */
    final public static function getNameOf($value)
    {
        if (self::isDefined($value)) {
            return array_search($value, self::$options, true);
        }

        throw new \InvalidArgumentException(sprintf('value (%s) is not defined in %s', $value, get_called_class()));
    }

    /**
     * Return the ordinal of value.
     *
     * @param integer|string $value
     *
     * @return integer|null
     *
     * @throws \InvalidArgumentException Throws if the given value is not defined.
     */
    final public static function getOrdinalOf($value)
    {
        if (!self::isDefined($value)) {
            throw new \InvalidArgumentException();
        }

        $values = self::getValues();

        return array_search($value, $values, true);
    }

    /**
     * Return the ordinal of name.
     *
     * @param string $name
     *
     * @return integer|null
     *
     * @throws \InvalidArgumentException Throws if the given name is not defined.
     */
    final public static function getOrdinalOfName($name)
    {
        if (!self::isDefinedName($name)) {
            throw new \InvalidArgumentException();
        }

        $names = self::getNames();

        return array_search($name, $names, true);
    }

    /**
     * Initialize enum list.
     *
     * @return void
     */
    final private static function initOptions()
    {
        if (!isset(self::$options)) {
            $class         = get_called_class();
            $refClass      = new \ReflectionClass($class);
            self::$options = $refClass->getConstants();
        }
    }
}
