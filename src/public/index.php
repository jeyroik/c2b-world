<?php
require(__DIR__ . '/../../vendor/autoload.php');

if (is_file(__DIR__ . '/../../.env')) {

    $dotenv = \Dotenv\Dotenv::create(__DIR__ . '/../../');
    $dotenv->load();
}

use c2b\components\Existence;
use extas\components\SystemContainer;
use c2b\interfaces\worlds\IWorldRepository;

/**
 * @var $worldRepo IWorldRepository
 */
$worldRepo = SystemContainer::getItem(IWorldRepository::class);

$existence = new Existence();
echo '<pre>';

if (isset($_REQUEST['world'])) {
    $world = $existence->getWorld($_REQUEST['world']);
    if ($world) {
        $existence->playWorld($world);
        $worldRepo->update($world);
        print_r($world);
    }
} else {
    $worlds = $existence->getWorlds();
    foreach ($worlds as $world) {
        $existence->playWorld($world);
        $worldRepo->update($world);
        print_r($world);
    }
}