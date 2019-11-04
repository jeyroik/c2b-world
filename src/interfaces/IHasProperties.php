<?php
namespace c2b\interfaces;

use c2b\interfaces\worlds\properties\IWorldProperty;

/**
 * Interface IHasProperties
 *
 * @package c2b\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasProperties
{
    const FIELD__PROPERTIES = 'properties';

    /**
     * @return IWorldProperty[]
     */
    public function getProperties(): array;

    /**
     * @param string $name
     *
     * @return IWorldProperty|null
     */
    public function getProperty(string $name): ?IWorldProperty;

    /**
     * @param IWorldProperty $property
     *
     * @return IHasProperties
     */
    public function addProperty(IWorldProperty $property): IHasProperties;

    /**
     * @param string $propertyName
     *
     * @return IHasProperties
     */
    public function removeProperty(string $propertyName): IHasProperties;
}
