<?php

namespace leo;timeprize

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\bossbar\BossBar;
use pocketmine\item\Item;

class Main extends PluginBase implements Listener{

    private $missions = [];
    private $missionStatus = [];

    public function onEnable() {
        // Load missions and missionStatus from config
        $this->saveDefaultConfig();
        $this->loadMissionsFromConfig();

        // Register events
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDisable() {
        // Save missions and missionStatus to config
        $this->saveMissionsToConfig();
    }

    public function onJoin(PlayerJoinEvent $event) {
        // Initialize the mission status for the player
        $player = $event->getPlayer();
        $this->missionStatus[$player->getName()] = [];
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($sender instanceof Player) {
            if (strtolower($command->getName()) === "mission") {
                // Implement toggling missions for the player here
                return true;
            }
        } else {
            $sender->sendMessage(TF::RED . "This command can only be used in-game.");
            return true;
        }
        return false;
    }

    public function onItemHeld(PlayerItemHeldEvent $event) {
        // Implement mission progress and boss bar handling here
    }

    public function loadMissionsFromConfig() {
        // Load missions data from the config.yml file
        // Store the data in the $missions array
    }

    public function saveMissionsToConfig() {
        // Save missions data to the config.yml file
    }

    public function startMission(Player $player, string $missionName) {
        // Start a mission for the player
    }

    public function completeMission(Player $player, string $missionName) {
        // Complete a mission for the player
    }

    public function broadcastMissionCompletion(Player $player, string $missionName) {
        // Broadcast a message when a player completes a mission
    }
}
