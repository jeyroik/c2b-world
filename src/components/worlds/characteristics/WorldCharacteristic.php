<?php
namespace c2b\components\worlds\characteristics;

use c2b\interfaces\worlds\characteristics\IWorldCharacteristic;
use extas\components\parameters\Parameter;

/**
 * Class WorldCharacteristic
 *
 * @package c2b\components\worlds\characteristics
 * @author jeyroik@gmail.com
 */
class WorldCharacteristic extends Parameter implements IWorldCharacteristic
{
    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'c2b.world.characteristic';
    }
}
