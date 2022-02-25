<?php

namespace StromHCF\factions;

use StromHCF\Loader;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class FactionsManager
{
    
    public static Config $config;
    
    public static function getConfig()
    {
        return self::$config;
    }
    
    public static function init()
    {
        self::$config = new Config(Loader::getInstance()->getDataFolder()."factions.json", Config::JSON);
    }
    
    public static function createFaction(string $factionName, string $playerName)
    {
        self::addToFaction($factionName, $playerName, "Leader");
        self::setDtrFaction($factionName, self::getMaxDtr());
        Loader::getInstance()->getServer()->broadcastMessage(TextFormat::colorize("&eFaction &a{$factionName} &ehas been created"));
    }
    
    public static function setDtrFaction(string $factionName, int $dtr)
    {
        $data["dtr"] = $dtr;
        self::getConfig()->set($factionName, $data);
        self::getConfig()->save();
    }
    
    public static function getDtrFaction(string $factionName): int
    {
        if(self::getConfig()->exists($factionName)){
            return self::getConfig()->get($factionName)["dtr"];
        }
        return 0;
    }
    
    public static function addToFaction(string $factionName, string $playerName, string $rankFaction)
    {
        if($rankFaction == "Leader"){
            $data["Leader"] = $playerName;
            self::getConfig()->set($factionName, $data);
            self::getConfig()->save();
        }
        $data["Members"] = $playerName;
        self::getConfig()->set($factionName, $data);
        self::getConfig()->save();
    }
    
    public static function getMembers(string $factionName): array
    {
        $members = [];
        $members[] = self::getConfig()->get($factionName)["Leader"];
        foreach(self::getConfig()->get($factionName)["Members"] as $member){
            $members[] = $member;
        }
        return $members;
    }
    
    public static function getMaxDtr(array $members): int
    {
        $count = count($members);
        if($count > 8){
            return 8;
        }
        return $count + 1;
    }
    
    public static function getAllFactions(): array
    {
        $factions = [];
        foreach(self::getConfig()->getAll() as $faction){
            $factions[] = $faction;
        }
        return $factions;
    }

}