<?php

namespace StromHCF\commands;

use StromHCF\Loader;

class CommandsManager
{

    public static function init()
    {
        Loader::getInstance()->getServer()->getCommandMap()->register("StromHCF", new FactionsCommand("f", "Factions Commands"));
    }

}