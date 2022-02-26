<?php

namespace StromHCF\claims;

class ClaimsManager 
{
    
    public static Config $config;
    
    public static function getConfig()
    {
        return self::$config;
    }
    
    public static function init()
    {
        self::$config = new Config(Loader::getInstance()->getDataFolder()."claims.json", Config::JSON);
    }
    
    public static function createClaim(string $factionName, string $claimType)
    {
        $data = ["x1" => 0, "z1" => 0, "x2" => 0, "z2" => 0, "type" => $claimType];
        self::getConfig($factionName, $data);
    }
    
}