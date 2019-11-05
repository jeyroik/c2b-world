<?php
namespace c2b\components\worlds\properties;

use c2b\interfaces\worlds\properties\IWorldProperty;
use extas\components\Item;
use extas\components\parameters\THasParameters;
use extas\components\THasName;

/**
 * Class WorldProperty
 *
 * @package c2b\components\worlds\properties
 * @author jeyroik@gmail.com
 */
class WorldProperty extends Item implements IWorldProperty
{
    use THasName;
    use THasParameters;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
