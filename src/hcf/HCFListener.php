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
}
?>