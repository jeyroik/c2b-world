<?php
namespace c2b\components;

use c2b\components\worlds\characteristics\WorldCharacteristic;
use c2b\interfaces\IHasCharacteristics;
use c2b\interfaces\worlds\characteristics\IWorldCharacteristic;

/**
 * Trait THasCharacteristics
 *
 * @property $config
 *
 * @package c2b\components
 * @author jeyroik@gmail.com
 */
trait THasCharacteristics
{
    /**
     * @return IWorldCharacteristic[]
     */
    public function getCharacteristics(): array
    {
        $chars = $this->getCharacteristicsData();
        $characteristics = [];
        foreach ($chars as $char) {
            $characteristics[] = new WorldCharacteristic($char);
        }

        return $characteristics;
    }

    /**
     * @param string $characteristicName
     *
     * @return IWorldCharacteristic|null
     */
    public function getCharacteristic(string $characteristicName): ?IWorldCharacteristic
    {
        $chars = $this->getCharacteristicsData();
        $char = $chars[$characteristicName] ?? false;

        if ($char) {
            return new WorldCharacteristic($char);
        }

        return null;
    }

    /**
     * @param IWorldCharacteristic $characteristic
     *
     * @return IHasCharacteristics|THasCharacteristics
     */
    public function addCharacteristic(IWorldCharacteristic $characteristic): IHasCharacteristics
    {
        $chars = $this->getCharacteristicsData();

        $chars[$characteristic->getName()] = $characteristic->__toArray();

        return $this;
    }

    /**
     * @param string $characteristicName
     *
     * @return IHasCharacteristics|THasCharacteristics
     */
    public function removeCharacteristic(string $characteristicName): IHasCharacteristics
    {
        $chars = $this->getCharacteristicsData();

        if (isset($chars[$characteristicName])) {
            unset($chars[$characteristicName]);
        }

        return $this;
    }

    /**
     * @return array
     */
    protected function getCharacteristicsData()
    {
        return $this->config[IHasCharacteristics::FIELD__CHARACTERISTICS] ?? [];
    }
}
