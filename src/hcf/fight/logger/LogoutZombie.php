<?php

namespace hcf\fight\logger;

use hcf\HCFLoad;
use hcf\PlayerHCF;

use pocketmine\entity\{Entity,Zombie};

use pocketmine\utils\TextFormat as Text;

use pocketmine\item\Item;

use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\{StringTag, ListTag};

use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;

class LogoutZombie extends Zombie {

public $nombre = "";


public $timeLeft = 0;

public function initEntity(): void {
parent::initEntity();
$this->setMaxHealth(200);
}
}
?>
