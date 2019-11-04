<?php
namespace c2b\components\properties;

use c2b\components\plugins\worlds\mutations\WorldMutationEnergy;
use c2b\interfaces\worlds\resources\IWorldResource;

/**
 * Class PropertyEnergySaturation
 *
 * @package c2b\components\properties
 * @author jeyroik@gmail.com
 */
class PropertyEnergySaturation
{
    /**
     * @param IWorldResource $resource
     */
    public function __invoke(IWorldResource &$resource)
    {
        $char = $resource->getCharacteristic(WorldMutationEnergy::RES__CHAR_VALUE);

        if ($char) {
            //todo get inc by energy type or additional char
            $char->setValue($char->getValue(0) + 2);
            $resource = $resource->addCharacteristic($char);
        }
    }
}
