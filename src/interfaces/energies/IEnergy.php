<?php
namespace c2b\interfaces\energies;

use extas\interfaces\IItem;

/**
 * Interface IEnergy
 *
 * @package c2b\interfaces\energies
 * @author jeyroik@gmail.com
 */
interface IEnergy extends IItem
{
    const SUBJECT = 'c2b.energy';

    const TYPE__WORLD_BASE = 'world.base';
}
