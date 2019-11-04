<?php
namespace c2b\components;

use c2b\interfaces\IChanceAble;
use c2b\interfaces\IExistence;
use c2b\interfaces\worlds\IWorld;
use c2b\interfaces\worlds\IWorldRepository;
use extas\components\Item;
use extas\components\SystemContainer;

/**
 * Class Existence
 *
 * @package c2b\components
 * @author jeyroik@gmail.com
 */
class Existence extends Item implements IExistence
{
    protected $chanceIs = 0;

    /**
     * @return array
     */
    public function getWorlds(): array
    {
        /**
         * @var $worldRepo IWorldRepository
         */
        $worldRepo = SystemContainer::getItem(IWorldRepository::class);

        return $worldRepo->all([]);
    }

    /**
     * @param string $worldName
     *
     * @return IWorld|null
     */
    public function getWorld(string $worldName): ?IWorld
    {
        /**
         * @var $worldRepo IWorldRepository
         */
        $worldRepo = SystemContainer::getItem(IWorldRepository::class);

        return $worldRepo->one([
            IWorld::FIELD__NAME => $worldName
        ]);
    }

    /**
     * @param IWorld $world
     *
     * @return IExistence
     */
    public function playWorld(IWorld &$world): IExistence
    {
        $worldResources = $world->getResources();

        // насыщение
        $this->worldStage($world, 'world.saturation');// насыщение мира
        $this->worldResourceStage($world, $worldResources, 'saturation');// насыщение ресурса

        // развитие
        $this->worldStage($world, 'world.progress');// развитие мира
        $this->worldResourceStage($world, $worldResources, 'progress');// развитие ресурса

        // потребление
        $this->worldStage($world, 'world.consuming');// потребление мира
        $this->worldResourceStage($world, $worldResources, 'consuming');// потребление ресурса

        // деградация
        $this->worldStage($world, 'world.degradation');// деградация мира
        $this->worldResourceStage($world, $worldResources, 'degradation');// деградация ресурса

        // мутация
        $this->worldChanceStage($world, 'world.mutation');// мутация мира
        $this->worldResourceChanceStage($world, $worldResources, 'mutation');// мутация ресурса

        return $this;
    }

    /**
     * @param IWorld $world
     * @param string $stage
     */
    protected function worldStage(IWorld &$world, string $stage)
    {
        foreach ($this->getPluginsByStage($stage) as $plugin) {
            $plugin($world);
        }
    }

    /**
     * @param IWorld $world
     *
     * @param string $stage
     */
    protected function worldChanceStage(IWorld &$world, string $stage)
    {
        foreach ($this->getPluginsByStage($stage) as $plugin) {
            if ($this->existenceChoice($plugin)) {
                $plugin($world);
            }
        }
    }

    /**
     * @param IWorld $world
     * @param array $worldResources
     * @param $stage
     */
    protected function worldResourceStage(IWorld $world, array $worldResources, $stage)
    {
        foreach ($worldResources as $worldResource) {
            $stage = 'world.' . $worldResource->getName() . '.' . $stage;
            foreach ($this->getPluginsByStage($stage) as $plugin) {
                $plugin($world, $worldResource);
            }
        }
    }

    /**
     * @param IWorld $world
     * @param array $worldResources
     * @param $stage
     */
    protected function worldResourceChanceStage(IWorld $world, array $worldResources, $stage)
    {
        foreach ($worldResources as $worldResource) {
            $stage = 'world.' . $worldResource->getName() . '.' . $stage;
            foreach ($this->getPluginsByStage($stage) as $plugin) {
                if ($this->existenceChoice($plugin)) {
                    $plugin($world, $worldResource);
                }
            }
        }
    }

    /**
     * @param IChanceAble $plugin
     *
     * @return bool
     */
    protected function existenceChoice(IChanceAble $plugin): bool
    {
        if (!$this->chanceIs) {
            $min = getenv('C2B__CHANCE_MIN') ?: 0;
            $max = getenv('C2B__CHANCE_MAX') ?: 999;
            $this->chanceIs = mt_rand($min, $max);
        }

        return $plugin->getChoice() == $this->chanceIs;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
