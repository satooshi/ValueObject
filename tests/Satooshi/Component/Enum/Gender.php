<?php

namespace Satooshi\Component\Enum;

use Satooshi\Component\Enum\EnumValueObject;

/**
 * @method isMale()
 * @method isFemale()
 * @method createMale()
 * @method createFemale()
 */
final class Gender implements EnumValueObject
{
    use \Satooshi\Component\Enum\Enum;

    const MALE = 'M';
    const FEMALE = 'F';

    // test purpose
    public function toJson()
    {
        return json_encode(
            [
                'name'     => $this->getName(),
                'value'    => $this->getValue(),
                'isMale'   => var_export($this->isMale(), true),
                'isFemale' => var_export($this->isFemale(), true),
            ]
        );
    }
}
