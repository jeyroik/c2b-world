<?php
namespace c2b\interfaces;
use c2b\interfaces\worlds\characteristics\IWorldCharacteristic;

/**
 * Interface IHasCharacteristics
 *
 * @package c2b\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasCharacteristics
{
    const FIELD__CHARACTERISTICS = 'characteristics';

    /**
     * @return IWorldCharacteristic[]
     */
    public function getCharacteristics(): array;

    /**
     * @param string $characteristicName
     *
     * @return IWorldCharacteristic|null
     */
    public function getCharacteristic(string $characteristicName): ?IWorldCharacteristic;

    /**
     * @param IWorldCharacteristic $characteristic
     *
     * @return IHasCharacteristics
     */
    public function addCharacteristic(IWorldCharacteristic $characteristic): IHasCharacteristics;

    /**
     * @param string $characteristicName
     *
     * @return IHasCharacteristics
     */
    public function removeCharacteristic(string $characteristicName): IHasCharacteristics;
}
