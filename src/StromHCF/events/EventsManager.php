<?php

namespace StromHCF\events;

use StromHCF\Loader;

class EventsManager
{

    public static function init()
    {
        Loader::getInstance()->getServer()->getPluginManager()->registerEvents(new PlayerEvents(), Loader::getInstance());
        Loader::getInstance()->getServer()->getPluginManager()->registerEvents(new FactionsListeners(), Loader::getInstance());
    }

}