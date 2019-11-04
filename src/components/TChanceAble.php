<?php
namespace c2b\components;

use c2b\interfaces\IChanceAble;

/**
 * Trait TChanceAble
 *
 * @property $config
 *
 * @package c2b\components
 * @author jeyroik@gmail.com
 */
trait TChanceAble
{
    /**
     * @return int
     */
    public function getChoice(): int
    {
        return $this->config[IChanceAble::FIELD__CHOICE] ?? $this->getRandomChoice();
    }

    /**
     * @return int
     */
    protected function getRandomChoice(): int
    {
        $min = getenv('C2B__CHANCE_MIN') ?: 0;
        $max = getenv('C2B__CHANCE_MAX') ?: 999;

        return mt_rand($min, $max);
    }
}
