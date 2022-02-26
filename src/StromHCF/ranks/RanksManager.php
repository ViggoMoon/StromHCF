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
        Loader::getInstance()->saveResource("ranks_settings.json");
        self::$config = new Config(Loader::getInstance()->getDataFolder()."ranks.json", Config::JSON);
    }
    
    public static function setRank(string $playerName, string $rank)
    {
        self::getConfig()->set($playerName, $rank);
        self::getConfig()->save();
    }
    
    public static function getRank(string $playerName): string
    {
        return self::getConfig()->get($playerName);
    }
    
}