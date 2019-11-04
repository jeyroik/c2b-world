<?php
namespace c2b\interfaces\worlds\properties;

use extas\interfaces\IHasClass;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;

/**
 * Interface IWorldProperty
 *
 * @package c2b\interfaces\worlds\properties
 * @author jeyroik@gmail.com
 */
interface IWorldProperty extends IItem, IHasClass, IHasName
{
    const SUBJECT = 'c2b.world.property';
}
