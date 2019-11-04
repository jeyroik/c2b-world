<?php
namespace c2b\components\plugins\worlds\mutations;

use c2b\components\plugins\PluginChoiceAble;
use c2b\components\properties\PropertyEnergySaturation;
use c2b\components\worlds\characteristics\WorldCharacteristic;
use c2b\components\worlds\properties\WorldProperty;
use c2b\components\worlds\WorldResource;
use c2b\interfaces\energies\IEnergy;
use c2b\interfaces\worlds\characteristics\IWorldCharacteristic;
use c2b\interfaces\worlds\IWorld;
use c2b\interfaces\worlds\properties\IWorldProperty;
use c2b\interfaces\worlds\resources\IWorldResource;

/**
 * Class WorldMutationEnergy
 *
 * Add
 * - char "energy"
 * - prop "energy_saturation"
 *
 * @stage world.mutation
 * @package c2b\components\plugins\worlds\mutations
 * @author jeyroik@gmail.com
 */
class WorldMutationEnergy extends PluginChoiceAble
{
    const RES__NAME = 'energy_base';
    const CHAR__NAME = 'energy_intensity';
    const PROP__SATURATION = 'energy_saturation';

    const RES__CHAR_VALUE = 'energy_value';
    const RES__CHAR_TYPE = 'energy_type';

    protected $choice = 10;

    /**
     * @param IWorld $world
     */
    public function __invoke(IWorld &$world)
    {
        $energyChar = $world->getCharacteristic(static::CHAR__NAME);

        if (!$energyChar) {
            $world = $world->addCharacteristic(new WorldCharacteristic([
                IWorldCharacteristic::FIELD__NAME => static::CHAR__NAME,
                IWorldCharacteristic::FIELD__VALUE => 1
            ]));
        }

        $energyProp = $world->getProperty(static::PROP__SATURATION);

        if (!$energyProp) {
            $world = $world->addProperty(new WorldProperty([
                IWorldProperty::FIELD__NAME => static::PROP__SATURATION,
                IWorldProperty::FIELD__CLASS => PropertyEnergySaturation::class
            ]));
        }

        $energyResource = $world->getResource(static::RES__NAME);

        if (!$energyResource) {
            $energy = new WorldResource([IWorldResource::FIELD__NAME => static::RES__NAME]);
            $energy->addCharacteristic(new WorldCharacteristic([
                IWorldCharacteristic::FIELD__NAME => static::RES__CHAR_VALUE,
                IWorldCharacteristic::FIELD__VALUE => 0
            ]))->addCharacteristic(new WorldCharacteristic([
                IWorldCharacteristic::FIELD__NAME => static::RES__CHAR_TYPE,
                IWorldCharacteristic::FIELD__VALUE => IEnergy::TYPE__WORLD_BASE
            ]));
            $world = $world->addResource($energy);
        }
    }
}
