<?php
namespace c2b\components\worlds;

use c2b\interfaces\worlds\IWorldRepository;
use extas\components\repositories\Repository;

/**
 * Class WorldRepository
 *
 * @package c2b\components\worlds
 * @author jeyroik@gmail.com
 */
class WorldRepository extends Repository implements IWorldRepository
{
    protected $itemClass = World::class;
    protected $idAs = '';
    protected $pk = World::FIELD__NAME;
    protected $name = 'worlds';
    protected $scope = 'c2b';
}
