<?php

namespace Satooshi\Component\Enum;

/**
 * Conventional naming method implementation of Enum trait.
 *
 * @author Kitamura Satoshi <with.no.parachute@gmail.com>
 */
trait ConventionalEnum
{
    /**
     * Delegate to test method such as isXxx().
     *
     * @param string $methodName
     * @param array  $args
     *
     * @return mixed
     */
    final public function __call($methodName, array $args)
    {
        if (false !== stripos($methodName, 'is')) {
            // isCamelCaseName -> CamelCaseName
            $name = substr($methodName, 2);

            return $this->is($name);
        }

        throw new \InvalidArgumentException();
    }

    /**
     * Delegate to factory method such as createXxx().
     *
     * @param string $methodName
     * @param array  $args
     *
     * @return \Satooshi\Component\Enum\ConventionalEnum
     *
     * @throws \InvalidArgumentException
     */
    final public static function __callStatic($methodName, array $args)
    {
        if (false !== stripos($methodName, 'create')) {
            // createCamelCaseName -> CamelCaseName
            $name = substr($methodName, 6);

            return self::create($name);
        }

        throw new \InvalidArgumentException();
    }

    /**
     * Create Enum object.
     *
     * @param string $name CamelCase constant name.
     *
     * @return \Satooshi\Component\Enum\ConventionalEnum
     *
     * @throws \InvalidArgumentException
     */
    final private static function create($name)
    {
        $nameUpperCase = self::toUpperCaseName($name);

        if (!self::isDefinedName($nameUpperCase)) {
            throw new \InvalidArgumentException(sprintf('name is not defined: %s', $nameUpperCase));
        }

        $value = self::getValueOf($nameUpperCase);

        return new static($value);
    }

    /**
     * Convert CamelCase to UPPER_CASE.
     *
     * @param string $name CamelCase name.
     *
     * @return string
     *
     * @todo CamelCase -> UPPER_CASE
     */
    final private static function toUpperCaseName($name)
    {
        // http://stackoverflow.com/questions/1175208/elegant-python-function-to-convert-camelcase-to-camel-case

        $s1 = preg_replace('/(.)([A-Z][a-z]+)/', '$1_$2', $name);
        $s2 = preg_replace('/([a-z0-9])([A-Z])/', '$1_$2', $s1);

        return strtoupper($s2);
    }
}
