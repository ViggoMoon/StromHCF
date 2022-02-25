<?php

namespace StromHCF\events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use StromHCF\sessions\SessionsManager;

class PlayerEvents implements Listener
{

    public function onJoin(PlayerJoinEvent $event)
    {
        SessionsManager::createSession($event->getPlayer()->getName());
        $event->setJoinMessage("Lol");
    }

}