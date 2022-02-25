<?php

namespace StromHCF;

use pocketmine\plugin\PluginBase;
use StromHCF\events\EventsManager;

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
        EventsManager::init();
    }

}