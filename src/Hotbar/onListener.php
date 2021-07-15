<?php

declare(strict_types=1);

namespace Hotbar;

use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerBlockPickEvent;
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

    public function onPick(PlayerBlockPickEvent $event) {
        $event->setCancelled();
    }

    public function onConsume(PlayerItemConsumeEvent $event) {
        $event->setCancelled(true);
    }

    public function onJoin(PlayerJoinEvent $event) {

        $player = $event->getPlayer();

        $player->getInventory()->clearAll(true);
        $player->getInventory()->setItem(0, Item::get(357)->setCustomName("§r§bRules"));
    }

    public function onInteract(PlayerInteractEvent $event) {
        $player = $event->getPlayer();
        if ($event->getAction() == 3 OR $event->getAction() == 1) {
            if ($player->getInventory()->getItemInHand()->getId() !== 357) return;
            $this->rules($player);
        }
    }

    public function rules($player) {
        $api = $player->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $player, int $data = null) {
            $result = $data;
            if ($result === null) return;
        });
        $form->setTitle("§r§l§bServer Rules");
        $form->setContent("1. Be Nice\n\n2. Don't Hack/Cheat\n\n3. Refer to Eric as Padrino\n\n3. Follow Rules");
        $form->sendToPlayer($player);
        return $form;
    }
}