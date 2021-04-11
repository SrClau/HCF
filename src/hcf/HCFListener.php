<?php

namespace hcf;

use pocketmine\event\{Listener,player\PlayerJoinEvent,player\PlayerCreationEvent,player\PlayerPreLoginEvent,player\PlayerQuitEvent,player\PlayerMoveEvent,player\PlayerChatEvent,player\PlayerInteractEvent,player\PlayerDeathEvent};

use pocketmine\utils\TextFormat as Text;

use pocketmine\entity\Entity;

use pocketmine\level\{Level,Position};

use pocketmine\math\Vector3;

use pocketmine\tile\Sign;

use pocketmine\item\Item;

use pocketmine\event\block\{SignChangeEvent,BlockBreakEvent};

use pocketmine\{Player};

use hcf\{HCFLoad,PlayerHCF};

class HCFListener implements Listener {

private $hcf;

public function __construct(HCFLoad $load){
$this->hcf = $load;
}

public function creationPlayer(PlayerCreationEvent $event){
$event->setPlayerClass(PlayerHCF::class);
}

public function kbPlayer(EntityDamageByEntityEvent $event){
$damage = $event->getDamager();
$entity = $event->getEntity();
if($player->getLevel()->getFolderName() === $this->hcf->getServer()->getDefaultLevel()->getName() & $entity->getLevel()->getFolderName() === $this->hcf->getDefaultLevel()->getName()){
if($damage instanceof PlayerHCF && $entity instanceof PlayerHCF){
$event->setKnockBack(0.50);
$event->setCancelled(false);
return;
      }
   }
}

public function signChange(SignChangeEvent $event){
$lines = $event->getLines();
if($lines[0] === "[elevator]"){
$elevator = strtolower($lines[1]);
 if($elevator === "up" || $elevator === "down"){
  if($lines[2] === "" || $lines[2] === ""){
  $event->setLine(0, Text::BOLD . Text::DARK_GRAY . "[" . Text::AQUA . "Elevator" . Text::DARK_GRAY . "]");
  $event->setLine(1, Text::YELLOW . ucfirst($lines[1]));
         }
      } 
   } 
}

public function onbreak(BlockBreakEvent $event){
$player = $event->getPlayer(); //object: PlayerHCF
$block = $event->getBlock(); 
if($player->hasEffect()){
$event->setCancelled(true);
return;
}
if(($block->getId() === Block::DIAMOND_ORE) && !isset($this->blocks[])){
$diamond = 0;
 for($x = $block->getX()-5; $x <= $block->getX() + 4; $x++){
   for($z = $block->getZ()-5; $z <= $block->getZ() + 4; $z++){
     for($y = $block->getY()-5; $y <= $block->getY() + 4; $y++){
       if(($player->getLevel()->getBlockIdAt($x, $y, $z)) === Block::DIAMOND_ORE && !isset($this->blocks[])){
     $this->blocks[] = true;
     $diamond++;  
       }
     }
   }
 }
$this->hcf->getServer()->broadcastMessage(MessageManager::sendMessage("foundDiamond", ["name" => Text::YELLOW . $player->getName(), "amount" => Text::BLUE . $diamond]));
   }
}
}
?>