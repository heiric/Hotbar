<?php

declare(strict_types=1);

namespace Hotbar;

use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\inventory\InventoryTransactionEvent;

class onListener implements Listener {

    private $plugin;

    public function  __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    public function onDrop(PlayerDropItemEvent $event) {
        $event->setCancelled(true);
    }

    public function onTransact(InventoryTransactionEvent $event) {
        $event->setCancelled(true);
    }

    public function onConsume(PlayerItemConsumeEvent $event) {
        $event->setCancelled(true);
    }

    public function onJoin(PlayerJoinEvent $event) {

        $player = $event->getPlayer();

        $player->getInventory()->clearAll(true);
        $player->getInventory()->setItem(0, Item::get(357, 0, 1)->setCustomName("§bRules"));
    }
}