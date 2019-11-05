<?php
namespace c2b\interfaces\worlds\properties;

use extas\interfaces\IHasName;
use extas\interfaces\IItem;
use extas\interfaces\parameters\IHasParameters;

/**
 * Interface IWorldProperty
 *
 * @package c2b\interfaces\worlds\properties
 * @author jeyroik@gmail.com
 */
interface IWorldProperty extends IItem, IHasName, IHasParameters
{
    const SUBJECT = 'c2b.world.property';
}
