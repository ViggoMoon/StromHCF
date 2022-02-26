<?php

namespace StromHCF\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use StromHCF\factions\FactionsManager;

class FactionsCommand extends Command
{

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if (empty($args[0])) {
                $sender->sendMessage(TextFormat::colorize("&cUse: /f help"));
            }
            if ($args[0] == "help") {
                $sender->sendMessage(TextFormat::colorize("&l&6Factions Commands"));
                $sender->sendMessage(TextFormat::colorize("&7---------------------------"));
                $sender->sendMessage(TextFormat::colorize("&a- &7/f create (factionName)"));
                $sender->sendMessage(TextFormat::colorize("&7---------------------------"));
            }
            if ($args[0] == "create") {
                if (empty($args[1])) {
                    $sender->sendMessage(TextFormat::colorize("&cUse: /f create (factionName)"));
                }
                if (FactionsManager::isInFaction($sender->getName()) == true) {
                    $sender->sendMessage(TextFormat::colorize("&cYou Are In-Faction"));
                }
                if (FactionsManager::isFaction($args[1]) == true) {
                    $sender->sendMessage(TextFormat::colorize("&cFaction {$args[1]} Already Exists"));
                }
                FactionsManager::createFaction($args[1], $sender->getName());
            }
        }
    }

}