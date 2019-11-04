<?php
namespace c2b\components\plugins;

use c2b\components\TChanceAble;
use c2b\interfaces\IChanceAble;
use extas\components\plugins\Plugin;

/**
 * Class PluginChoiceAble
 *
 * @package c2b\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginChoiceAble extends Plugin implements IChanceAble
{
    use TChanceAble;

    protected $choice = 0;

    /**
     * PluginChoiceAble constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (!isset($config[IChanceAble::FIELD__CHOICE])) {
            $config[IChanceAble::FIELD__CHOICE] = $this->choice;
        }

        parent::__construct($config);
    }
}
