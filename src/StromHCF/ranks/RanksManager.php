<?php

namespace StromHCF\ranks;

use pocketmine\utils\Config;
use StromHCF\Loader;

class RanksManager
{

    public static Config $config;

    public static Config $configRanks;

    public static function init()
    {
        Loader::getInstance()->saveResource("ranks_settings.json");
        self::$config = new Config(Loader::getInstance()->getDataFolder() . "ranks.json", Config::JSON);
    }

    public static function setRank(string $playerName, string $rank)
    {
        self::getConfig()->set($playerName, $rank);
        self::getConfig()->save();
    }

    public static function getConfig(): Config
    {
        return self::$config;
    }

    public static function getRank(string $playerName): string
    {
        return self::getConfig()->get($playerName);
    }

    public static function getPermissionsByRank(string $rankName)
    {
        $permissions = [];
        foreach (self::$configRanks->get($rankName)["permissions"] as $permission) {
            $permissions[] = $permission;
        }
        return $permissions;
    }

}