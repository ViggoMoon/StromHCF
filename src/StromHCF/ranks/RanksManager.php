<?php

namespace StromHCF\ranks;

class RanksManager 
{
    
    public static Config $config;
    
    public static function getConfig()
    {
        return self::$config;
    }
    
    public static function init()
    {
        self::$config = new Config(Loader::getInstance()->getDataFolder()."ranks.json", Config::JSON);
    }
    
}