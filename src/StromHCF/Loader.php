<?php

namespace StromHCF;

use pocketmine\plugin\PluginBase;
use StromHCF\claims\ClaimsManager;
use StromHCF\events\EventsManager;
use StromHCF\factions\FactionsManager;

class Loader extends PluginBase
{

    public static Loader $instance;

    public static function getInstance(): Loader
    {
        return self::$instance;
    }

    protected function onEnable(): void
    {
        self::$instance = $this;
        ClaimsManager::init();
        EventsManager::init();
        FactionsManager::init();
    }

}