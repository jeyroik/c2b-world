<?php
namespace c2b\interfaces;

/**
 * Interface IChanceAble
 *
 * @package c2b\interfaces
 * @author jeyroik@gmail.com
 */
interface IChanceAble
{
    const FIELD__CHOICE = 'choice';

    /**
     * @return int
     */
    public function getChoice(): int;
}
