<?php
namespace c2b\components;

use c2b\components\worlds\properties\WorldProperty;
use c2b\interfaces\IHasProperties;
use c2b\interfaces\worlds\properties\IWorldProperty;

/**
 * Trait THasProperties
 *
 * @property $config
 *
 * @package c2b\components
 * @author jeyroik@gmail.com
 */
trait THasProperties
{
    /**
     * @return IWorldProperty[]
     */
    public function getProperties(): array
    {
        $props = $this->getPropertiesData();
        $properties = [];

        foreach ($props as $property) {
            $properties[] = new WorldProperty($property);
        }

        return $properties;
    }

    /**
     * @param string $name
     *
     * @return IWorldProperty|null
     */
    public function getProperty(string $name): ?IWorldProperty
    {
        $props = $this->getPropertiesData();

        if (isset($props[$name])) {
            return new WorldProperty($props[$name]);
        }

        return null;
    }

    /**
     * @param IWorldProperty $property
     *
     * @return IHasProperties|THasProperties
     */
    public function addProperty(IWorldProperty $property): IHasProperties
    {
        $props = $this->getPropertiesData();
        $props[$property->getName()] = $property->__toArray();
        $this->config[IHasProperties::FIELD__PROPERTIES] = $props;

        return $this;
    }

    /**
     * @param string $propertyName
     *
     * @return IHasProperties|THasProperties
     */
    public function removeProperty(string $propertyName): IHasProperties
    {
        $props = $this->getPropertiesData();

        if (isset($props[$propertyName])) {
            unset($props[$propertyName]);
        }

        return $this;
    }

    /**
     * @return array
     */
    protected function getPropertiesData()
    {
        return $this->config[IHasProperties::FIELD__PROPERTIES] ?? [];
    }
}
