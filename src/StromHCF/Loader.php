<?php

namespace StromHCF;

use pocketmine\plugin\PluginBase;
use StromHCF\claims\ClaimsManager;
use StromHCF\commands\CommandsManager;
use StromHCF\events\EventsManager;
use StromHCF\factions\FactionsManager;

class Loader extends PluginBase
{

    public static Loader $instance;

    public static function getInstance(): Loader
    {
        return self::$instance;
    }

    public static function setInstance(Loader $instance): void
    {
        self::$instance = $instance;
    }

    protected function onEnable(): void
    {
        self::setInstance($this);
        CommandsManager::init();
        ClaimsManager::init();
        EventsManager::init();
        FactionsManager::init();
    }

}