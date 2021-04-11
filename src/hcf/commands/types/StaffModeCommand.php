<?php

namespace hcf\commands\types;

use pocketmine\plugin\{PluginCommand, CommandSender};

use hcf\{HCFLoad,PlayerHCF};

use pocketmine\utils\TextFormat as Text;

use pocketmine\level\particle\AngryVillagerParticle;

use muqsit\invmenu\InvMenu;

class StaffModeCommand extends PluginCommand {

public static $hcf;

public function __construct(HCFLoad $main){
parent::__construct("staff", $main);
self::$hcf = $main;
$this->setPermission("staffmode.hcf.command"); //Permissions (README.md)
$this->setDescription("StaffMode for staff only");
$this->setUsage("/staff help");
$this->setAliases(["s", "staffmode"]);
}

public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
 if(!$sender instanceof PlayerHCF){
  return;
 } 
if(!isset($args[0])){
$menu = InvMenu::create(InvMenu::TYPE_CHEST);
$menu->readonly();
$menu->setName("§bMenuStaff §7HCF");
$menu->getInventory()->setItem();
$menu->setListener(function(PlayerHCF $player, Item $itemTakeOut, Item $itemPutIn, SlotChangeAction $slotAction): bool {
if($itemTakeOut->getCustomName() === Text::AQUA . "STAFF" . " " . Text::GREEN . "Enable"){
$player->sendStaffMode();
$player->removeWindow($change->getInventory());
}
if($itemTakeOut->getCustomName() === Text::AQUA . "STAFF" . " " . Text::RED . "Disable"){
$player->exitStaffMode();
$player->removeWindow($change->getInventory());
}
});
$menu->send($sender);
return;
}
return true;
   }
}