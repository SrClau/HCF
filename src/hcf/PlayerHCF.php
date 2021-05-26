<?php

namespace hcf;

use hcf\HCFLoad;

use pocketmine\Player;

use pocketmine\item\Item;

use pocketmine\nbt\tag\{CompoundTag,ListTag,IntTag,StringTag};

use pocketmine\utils\{Config,TextFormat as Text};

class PlayerHCF extends Player {

public const PUBLIC_CHAT = 0;

public const FACTION_CHAT = 1;

public const ALLY_CHAT = 2;

public const STAFF_CHAT = 3;

public $hcf;

public $class = "";
public $oldClass;

public $region = "";

public $balance = 0;

public $invites = [];

public $logout = false;

/** @var bool $reclaim **/
public $reclaim = false;

/** @var int $chat **/
public $chat = self::PUBLIC;

/** @here Scoreboard **/
public $scoreboard;

/** @var Array[] String **/
public $permissions = [];

/** @var Array[] Item **/
public $inventoryItem = [];

/** @var Array[] Item **/
public $inventoryArmor = [];

/** @var Faction **/
public $faction;

/** @var Int $kills and $deaths **/
public $kills = 0;
public $deaths = 0;

/** @var Int $kits and $cooldown **/
public $kits = ["StarterKit" => 0, "DiamondKit" => 0, "RogueKit" => 0, "BardKit" => 0];
public $cooldown = ["EnderPearl" => 0];

public function addKill(int $amount):void{
$this->kills += $amount;
}

public function addDeath(int $amount):void{
$this->deaths += $amount;
}

public function setLogout(bool $value = true){
$this->logout = $value;  
}

public function getLogout(): bool {
return $this->logout ?? null;
}

/**
* @param String $name (config.yml)
* @return Integee
**/
public function getCooldown(string $name): int {
switch($name){
case "EnderPearl":
return (int)$this->cooldown["EnderPearl"];  
break;
     }
}
 
/** 
* @function setCooldown
* @param String $name (config.yml)
* @param Int $cooldown (config.yml)
**/
public function setCooldown(string $name, int $cooldown){
$this->cooldown[$name] = $cooldown;
}

public function setItems(Item $item){
$this->inventoryItem[] = $item;
}

public function getItems(): array {
return (array)$this->inventoryItem;  
}

public function setHelmet(Item $item){
$this->armorInventory["helmet"] = $item; 
}

public function setChestPlate(Item $item){
$this->inventoryArmor["chestplate"] = $item;
}

public function setLeggings(Item $item){
$this->inventoryArmor["leggings"] = $item;
}

public function setBoots(Item $item){
$this->inventoryArmor["boots"] = $item; 
}

public function getHelmet(): Item {
return $this->inventoryArmor["helmet"]; 
}

public function getChestPlate(): Item {
return $this->inventoryArmor["chestplate"];
}

public function getLeggings(): Item {
return $this->inventoryArmor["leggings"];  
}

public function getBoots(): Item {
return $this->inventoryArmor["boots"];  
}

public function setStaffMode(bool $value = false): void {
$this->staff["enabled"] = $value;
}

public function getStaffMode(): bool {
return $this->staff["enabled"];
}

public function sendStaffMode(): void {
foreach($this->getInventory()->getContents() as $item){
  $this->setItems($item);
}

$this->setHelmet($this->getArmorInventory()->getHelmet());
$this->setChestPlate($this->getArmorInventory()->getChestplate());
$this->setLeggings($this->getArmorInventory()->getLeggings());
$this->setBoots($this->getArmorInventory()->getBoots());

$this->getInventory()->clearAll(true);
$this->getArmorInventory()->clearAll(true);

$this->removeAllEffects();
$this->setGamemode(0);
$this->setAllowFlight(true);
$this->setFlying(true);
$freezeId = Item::get(Item::FROSTED_ICE, 0, 1);
$freezeId->setCustomName(Text::AQUA . "Freeze Player"); 
$freezeId->setLore([Text::GRAY . "Right click to freeze the player, Left click to see the frozen status of the player (not added)"]);
$freeezeTag = $freezeId->getNamedTag();
$freeezeTag->setString("staffmode", "freezeItem");
$freezeId->setNamedTag($freeezeTag);

$randomTeleport = Item::get(Item::COMPASS, 0, 1);
$randomTeleport->setCustomName(Text::YELLOW . "Random Teleport");
$randomTeleport->setLore([Text::GRAY . "Left Click to teleport to a player or a block"]);
$randomTeleportTag = $randomTeleport->getNamedTag();
$randomTeleportTag->setString("staffmode", "randomTeleport");
$randomTeleport->setNamedTag($randomTeleportTag);

$vanish = Item::get(351, 10, 1);
$vanish->setCustomName(Text::GREEN . "Vanish"); 
$vanish->setLore([Text::GRAY . "Click Left to hide or show"]);
$vanishTag = $vanish->getNamedTag();
$vanishTag->setString("staffmode", "vanishItem");
$vanish->setNamedTag($vanishTag);

$seeInventory = Item::get(Item::BOOK, 0, 1);
$seeInventory->setCustomName(Text::GOLD . "SeeInventory Player");
$seeInventory->setLore([Text::GRAY . ""]);
$seeInventoryTag = $seeInventory->getNamedTag();
$seeInventoryTag->setString("staffmode", "seeInventory");
$seeInventory->setNamedTag($seeInventoryTag);

$this->getInventory()->setItem(0, $vanish);
$this->getInventory()->setItem(2, $randomTeleport);
//$this->getInventory()->setItem(4, $configuration);
$this->getInventory()->setItem(6, $freezeId);
$this->getInventory()->setItem(8, $seeInventory);

$this->addTitle(Text::AQUA . "STAFFMODE", Text::GREEN . "Enabled");
$this->setStaffMode(true);
}

public function notSendStaffMode(): void {
$this->getInventory()->clearAll(true);
$this->getArmorInventory()->clearAll(true);

$this->inventory = [];
$this->setGamemode(0);
$this->setAllowFlight(false);
$this->setFlying(false);
foreach(HCFLoad::getInstance()->getServer()->getOnlinePlayers() as $player){
$player->showPlayer($this);
}
$this->setStaffMode(false);
}
}
