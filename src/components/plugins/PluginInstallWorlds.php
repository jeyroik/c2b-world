<?php
namespace c2b\components\plugins;

use c2b\components\worlds\World;
use c2b\interfaces\worlds\IWorldRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallWorlds
 *
 * @package c2b\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallWorlds extends PluginInstallDefault
{
    protected $selfName = 'world';
    protected $selfSection = 'worlds';
    protected $selfUID = World::FIELD__NAME;
    protected $selfItemClass = World::class;
    protected $selfRepositoryClass = IWorldRepository::class;
}
