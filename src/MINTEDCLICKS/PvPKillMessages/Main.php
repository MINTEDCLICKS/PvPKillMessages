<?php

namespace MINTEDCLICKS\PvPKillMessages;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerDeathEvent;

class Main extends PluginBase implements Listener{

public function onEnable() : void{
$this->getServer()->getPluginManager()->registerEvents($this, $this);
}

public function onPlayerDeath(PlayerDeathEvent $event) : void{
$playerkilled = $event->getPlayer();
$killer = $event->getPlayer()->getLastDamageCause()?->getDamager();
$killername = $killer->getName(); // the username of the killer
$playerkilledname = $playerkilled->getName(); // the username of the player who is killed
$killerhealth = $killer->getHealth(); // the health of the killer
$playerkilledhealth = $playerkilled->getHealth(); // the health of the player who is killed (this should always be 0)
$deathmsg = ("§c{$playerkilledname} §7was killed by §a{$killername} §7[§a{$killerhealth}§7]" ); // you can edit this to change the format, put variables in {}
$event->setDeathMessage($deathmsg);
}
}
