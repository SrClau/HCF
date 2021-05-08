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

private$hcf;

public $shop;

public function __construct(MythicalHCF $plugin){
$this->hcf = $plugin;
$this->shop = new Config($plugin->getDataFolder() . "", Config::);
}
}