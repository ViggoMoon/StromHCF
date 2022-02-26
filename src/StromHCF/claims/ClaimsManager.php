<?php

namespace StromHCF\claims;

use pocketmine\utils\Config;
use StromHCF\Loader;

class ClaimsManager
{

    public static Config $config;

    public static function init()
    {
        self::$config = new Config(Loader::getInstance()->getDataFolder() . "claims.json", Config::JSON);
    }

    public static function createClaim(string $factionName, string $claimType)
    {
        $data = ["x1" => 0, "z1" => 0, "x2" => 0, "z2" => 0, "type" => $claimType];
        self::getConfig()->set($factionName, $data);
        self::getConfig()->save();
    }

    public static function getConfig(): Config
    {
        return self::$config;
    }

}