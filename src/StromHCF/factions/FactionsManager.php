<?php

namespace StromHCF\factions;

use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use StromHCF\Loader;

class FactionsManager
{

    public static Config $config;
    public static array $inFaction = [];

    public static function init()
    {
        self::$config = new Config(Loader::getInstance()->getDataFolder() . "factions.json", Config::JSON);
    }

    public static function createFaction(string $factionName, string $playerName)
    {
        self::addToFaction($factionName, $playerName, "Leader");
        self::setDtrFaction($factionName, self::getMaxDtr(self::getAllMembers($factionName)));
        Loader::getInstance()->getServer()->broadcastMessage(TextFormat::colorize("&eFaction &a{$factionName} &ehas been created"));
    }

    public static function addToFaction(string $factionName, string $playerName, string $rankFaction)
    {
        if ($rankFaction == "Leader") {
            $data["Leader"] = $playerName;
            self::getConfig()->set($factionName, $data);
            self::getConfig()->save();
        }
        $data["Members"] = $playerName;
        self::getConfig()->set($factionName, $data);
        self::getConfig()->save();
        self::$inFaction[$playerName] = true;
    }

    public static function getConfig(): Config
    {
        return self::$config;
    }

    public static function setDtrFaction(string $factionName, int $dtr)
    {
        $data["dtr"] = $dtr;
        self::getConfig()->set($factionName, $data);
        self::getConfig()->save();
    }

    public static function getMaxDtr(array $members): int
    {
        $count = count($members);
        if ($count > 8) {
            return 8;
        }
        return $count + 1;
    }

    public static function getAllMembers(string $factionName): array
    {
        $members = [];
        $members[] = self::getConfig()->get($factionName)["Leader"];
        foreach (self::getConfig()->get($factionName)["Members"] as $member) {
            $members[] = $member;
        }
        return $members;
    }

    public static function getDtrFaction(string $factionName): int
    {
        if (self::getConfig()->exists($factionName)) {
            return self::getConfig()->get($factionName)["dtr"];
        }
        return 0;
    }

    public static function getAllFactions(): array
    {
        $factions = [];
        foreach (self::getConfig()->getAll() as $faction) {
            $factions[] = $faction;
        }
        return $factions;
    }

    public static function isFaction(string $factionName): bool
    {
        foreach (self::getAllFactions() as $allFaction) {
            if ($allFaction == $factionName) {
                return true;
            }
            return false;
        }
        return false;
    }

    public static function isInFaction(string $playerName): bool
    {
        if (self::$inFaction[$playerName] == true) return true;
        return false;
    }

}