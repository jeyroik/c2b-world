<?php
namespace c2b\interfaces\worlds;

use c2b\interfaces\IHasCharacteristics;
use c2b\interfaces\IHasProperties;
use c2b\interfaces\worlds\resources\IWorldResource;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;

/**
 * Interface IWorld
 *
 * @package c2b\interfaces\worlds
 * @author jeyroik@gmail.com
 */
interface IWorld extends IItem, IHasName, IHasProperties, IHasCharacteristics
{
    const SUBJECT = 'c2b.world';

    const FIELD__ITERATION = 'iteration';
    const FIELD__RESOURCES = 'resources';

    /**
     * @return int
     */
    public function getIteration(): int;

    /**
     * @param int $iteration
     *
     * @return IWorld
     */
    public function setIteration(int $iteration): IWorld;

    /**
     * @return IWorld
     */
    public function incIteration(): IWorld;

    /**
     * @return IWorldResource[]
     */
    public function getResources(): array;

    /**
     * @param string $name
     *
     * @return IWorldResource|null
     */
    public function getResource(string $name): ?IWorldResource;

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasResource(string $name): bool;

    /**
     * @param IWorldResource $resource
     *
     * @return IWorld
     */
    public function addResource(IWorldResource $resource): IWorld;

    /**
     * @param string $resourceName
     *
     * @return IWorld
     */
    public function removeResource(string $resourceName): IWorld;
}
