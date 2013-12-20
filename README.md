ValueObject, Enum, BitField
===========

[![Build Status](https://travis-ci.org/satooshi/ValueObject.png?branch=master)](https://travis-ci.org/satooshi/ValueObject)
[![Coverage Status](https://coveralls.io/repos/satooshi/ValueObject/badge.png?branch=master)](https://coveralls.io/r/satooshi/ValueObject)
[![Dependency Status](https://www.versioneye.com/package/php--satooshi--ValueObject/badge.png)](https://www.versioneye.com/package/php--satooshi--ValueObject)

[![Latest Stable Version](https://poser.pugx.org/satooshi/ValueObject/v/stable.png)](https://packagist.org/packages/satooshi/ValueObject)
[![Total Downloads](https://poser.pugx.org/satooshi/ValueObject/downloads.png)](https://packagist.org/packages/satooshi/ValueObject)

## ValueObject

```php
<?php

use Satooshi\Component\ValueObject\ValueObject;
use Satooshi\Component\ValueObject\ValueObjectTrait;

final class SampleValueObject implements ValueObject
{
    use ValueObjectTrait;

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
```

## Enum

```php
<?php

use Satooshi\Component\Enum\Enum;
use Satooshi\Component\Enum\EnumValueObject;

/**
 * @method isMale()
 * @method isFemale()
 */
final class Gender implements EnumValueObject
{
    use Enum;

    const MALE = 'M';
    const FEMALE = 'F';

    // test purpose
    public function toJson()
    {
        return json_encode([
            'name' => $this->getName(),
            'value' => $this->getValue(),
            'isMale' => var_export($this->isMale(), true),
            'isFemale' => var_export($this->isFemale(), true),
        ]);
    }
}

$male1 = Gender::createMale();
echo $male1->toJson(), PHP_EOL;
// {"name":"MALE","value":"M","isMale":"true","isFemale":"false"}

$male2 = Gender::createMale();
echo $male2->toJson(), PHP_EOL;
// {"name":"MALE","value":"M","isMale":"true","isFemale":"false"}

$female1 = Gender::createFemale();
echo $female1->toJson(), PHP_EOL;
// {"name":"FEMALE","value":"F","isMale":"false","isFemale":"true"}

$female2 = Gender::createFemale();
echo $female2->toJson(), PHP_EOL;
// {"name":"FEMALE","value":"F","isMale":"false","isFemale":"true"}

// true
var_dump($male1->isSameValueAs($male2)); // bool(true)
var_dump($female1->isSameValueAs($female2)); // bool(true)

// false
var_dump($female1->isSameValueAs($male1)); // bool(false)
var_dump($female1->isSameValueAs($male2)); // bool(false)

// serialize
$serializedMale = serialize($male1);
var_dump($serializedMale);
// string(25) "C:6:"Gender":8:{s:1:"M";}"

$unserializedMale = unserialize($serializedMale);
var_dump($unserializedMale);
/*
object(Gender)#5 (1) {
  ["value":"Gender":private]=>
  string(1) "M"
}
*/

// factory
$male = Gender::createMale();
var_dump($male);
/*
object(Gender)#6 (1) {
  ["value":"Gender":private]=>
  string(1) "M"
}
*/
$female = Gender::createFemale();
var_dump($female);
/*
object(Gender)#7 (1) {
  ["value":"Gender":private]=>
  string(1) "F"
}
*/
```

```php
<?php

use Satooshi\Component\Enum\Enum;
use Satooshi\Component\Enum\EnumValueObject;

final class Enum2 implements EnumValueObject
{
    use Enum;

    const HOGE_FUGA = 1;
    const FOO = 2;
}

$e21 = Enum2::createHogeFuga();
var_dump($e21);
/*
object(Enum2)#8 (1) {
  ["value":"Enum2":private]=>
  int(1)
}
 */
var_dump(Enum2::getNames());
/*
array(2) {
  [0]=>
  string(9) "HOGE_FUGA"
  [1]=>
  string(3) "FOO"
}
*/
```

## BitField

```php
<?php

use Satooshi\Component\Flags\Flags;
use Satooshi\Component\Flags\FlagsValueObject;

final class BitField1 implements FlagsValueObject
{
    use Flags;

    const NONE = 0;
    const A = 1;
    const B = 2;
    const C = 4;
    const D = 8;
}

$result = BitField1::D | BitField1::C;
var_dump($result);
// int(12)

$bit = BitField1::createFlags($result);
var_dump($bit);
/*
object(BitField1)#9 (2) {
  ["value":"BitField1":private]=>
  int(12)
  ["flagValues":"BitField1":private]=>
  array(2) {
    [0]=>
    int(4)
    [1]=>
    int(8)
  }
}
*/

$isNone = $bit->isNone();
$isA = $bit->isA();
$isB = $bit->isB();
$isC = $bit->isC();
$isD = $bit->isD();
var_dump($isNone, $isA, $isB, $isC, $isD);
/*
bool(false)
bool(false)
bool(false)
bool(true)
bool(true)
*/
```
