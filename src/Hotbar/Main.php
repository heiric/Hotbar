<?php

declare(strict_types=1);

namespace Hotbar;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;

class Main extends PluginBase implements Listener {

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new onListener($this), $this);
    }
}