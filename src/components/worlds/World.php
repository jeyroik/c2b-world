<?php
namespace c2b\components\worlds;

use c2b\components\THasCharacteristics;
use c2b\components\THasProperties;
use c2b\interfaces\worlds\IWorld;
use c2b\interfaces\worlds\resources\IWorldResource;
use c2b\components\worlds\resources\WorldResource;
use extas\components\Item;
use extas\components\THasName;

/**
 * Class World
 *
 * @package c2b\components\worlds
 * @author jeyroik@gmail.com
 */
class World extends Item implements IWorld
{
    use THasName;
    use THasProperties;
    use THasCharacteristics;

    /**
     * @return int
     */
    public function getIteration(): int
    {
        return $this->config[static::FIELD__ITERATION] ?? 0;
    }

    /**
     * @return IWorldResource[]
     */
    public function getResources(): array
    {
        $resData = $this->getResourcesData();
        $resources = [];

        foreach ($resData as $resource) {
            $resources[] = new WorldResource($resource);
        }

        return $resources;
    }

    /**
     * @param string $name
     *
     * @return IWorldResource|null
     */
    public function getResource(string $name): ?IWorldResource
    {
        $resources = $this->getResourcesData();

        if (isset($resources[$name])) {
            return new WorldResource($resources[$name]);
        }

        return null;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasResource(string $name): bool
    {
        $resources = $this->getResourcesData();

        return isset($resources[$name]);
    }

    /**
     * @param int $iteration
     *
     * @return IWorld
     */
    public function setIteration(int $iteration): IWorld
    {
        $this->config[static::FIELD__ITERATION] = $iteration;

        return $this;
    }

    /**
     * @return IWorld
     */
    public function incIteration(): IWorld
    {
        $this->setIteration($this->getIteration() + 1);

        return $this;
    }

    /**
     * @param IWorldResource $resource
     *
     * @return IWorld
     */
    public function addResource(IWorldResource $resource): IWorld
    {
        $resources = $this->getResourcesData();
        $resources[$resource->getName()] = $resource->__toArray();
        $this->config[static::FIELD__RESOURCES] = $resources;

        return $this;
    }

    /**
     * @param string $resourceName
     *
     * @return IWorld
     */
    public function removeResource(string $resourceName): IWorld
    {
        if ($this->hasResource($resourceName)) {
            unset($this->config[static::FIELD__RESOURCES][$resourceName]);
        }

        return $this;
    }

    /**
     * @return array
     */
    protected function getResourcesData(): array
    {
        return $this->config[static::FIELD__RESOURCES] ?? [];
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
