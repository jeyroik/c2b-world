<?php
namespace c2b\interfaces;

use c2b\interfaces\worlds\IWorld;
use extas\interfaces\IItem;

/**
 * Interface IExistence
 *
 * @package c2b\interfaces
 * @author jeyroik@gmail.com
 */
interface IExistence extends IItem
{
    const SUBJECT = 'c2b.existence';

    /**
     * @param IWorld $world
     *
     * @return IExistence
     */
    public function playWorld(IWorld &$world): IExistence;

    /**
     * @return IWorld[]
     */
    public function getWorlds(): array;

    /**
     * @param string $worldName
     *
     * @return IWorld|null
     */
    public function getWorld(string $worldName): ?IWorld;
}
