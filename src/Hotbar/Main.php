<?php

declare(strict_types=1);

namespace Hotbar;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new onListener($this), $this);
    }
}