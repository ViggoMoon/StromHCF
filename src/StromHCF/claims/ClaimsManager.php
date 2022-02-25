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
    
}