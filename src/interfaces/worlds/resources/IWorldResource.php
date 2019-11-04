<?php
namespace c2b\interfaces\worlds\resources;

use c2b\interfaces\IHasCharacteristics;
use c2b\interfaces\IHasProperties;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;

/**
 * Interface IWorldResource
 *
 * @package c2b\interfaces\worlds\resources
 * @author jeyroik@gmail.com
 */
interface IWorldResource extends IItem, IHasProperties, IHasCharacteristics, IHasName
{
    const SUBJECT = 'c2b.world.resource';
}
