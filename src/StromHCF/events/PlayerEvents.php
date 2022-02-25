<?php

namespace StromHCF\events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class PlayerEvents implements Listener
{

    public function onJoin(PlayerJoinEvent $event)
    {
        $event->setJoinMessage("Lol");
    }

}