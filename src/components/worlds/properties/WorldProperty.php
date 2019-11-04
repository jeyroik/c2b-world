<?php
namespace c2b\components\worlds\properties;

use c2b\interfaces\worlds\properties\IWorldProperty;
use extas\components\Item;
use extas\components\THasName;
use extas\components\THasClass;

/**
 * Class WorldProperty
 *
 * @package c2b\components\worlds\properties
 * @author jeyroik@gmail.com
 */
class WorldProperty extends Item implements IWorldProperty
{
    use THasName;
    use THasClass;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
