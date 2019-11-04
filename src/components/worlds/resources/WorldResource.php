<?php
namespace c2b\components\worlds;

use c2b\components\THasCharacteristics;
use c2b\components\THasProperties;
use c2b\interfaces\worlds\resources\IWorldResource;
use extas\components\Item;
use extas\components\THasName;

/**
 * Class WorldResource
 *
 * @package c2b\components\worlds
 * @author jeyroik@gmail.com
 */
class WorldResource extends Item implements IWorldResource
{
    use THasProperties;
    use THasCharacteristics;
    use THasName;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
