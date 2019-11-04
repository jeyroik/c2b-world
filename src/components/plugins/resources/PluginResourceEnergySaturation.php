<?php
namespace c2b\components\plugins\resources;

use c2b\components\plugins\worlds\mutations\WorldMutationEnergy;
use c2b\interfaces\worlds\IWorld;
use c2b\interfaces\worlds\resources\IWorldResource;
use extas\components\plugins\Plugin;

/**
 * Class PluginResourceEnergySaturation
 *
 * @stage world.energy_base.saturation
 * @package c2b\components\plugins\resources
 * @author jeyroik@gmail.com
 */
class PluginResourceEnergySaturation extends Plugin
{
    /**
     * @param IWorld $world
     * @param IWorldResource $resource
     */
    public function __invoke(IWorld $world, IWorldResource &$resource)
    {
        $property = $world->getProperty(WorldMutationEnergy::PROP__SATURATION);

        if ($property) {
            $influence = $property->buildClassWithParameters();
            $influence($resource);
            $world->addResource($resource);
        }
    }
}
