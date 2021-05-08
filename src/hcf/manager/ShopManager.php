<?php

namespace hcf\manager;

use pocketmine\item\Item;

use pocketmine\tile\{Tile, Sign};

use pocketmine\math\Vector3;

use pocketmine\utils\{
Config,
TextFormat as Text
};

class ShopManager {

public const BUY = "BUY";
public const SELL = "SELL";

private $hcf;

public $shop;

public function __construct(MythicalHCF $plugin){
$this->hcf = $plugin;
$this->shop = new Config($plugin->getDataFolder() . "listshop.yml", Config::YML);
}

public function createShop(int $id, int $damage, int $count, int $price, string $type = self::BUY, string $name = null, Vector3 $vector){

$tile = $this->hcf->getServer()->getDefaultLevel()->getTile($vector);
$position = $vector->getX() . ":" . $vector->getY() . ":" . $vector->getZ();
}
}