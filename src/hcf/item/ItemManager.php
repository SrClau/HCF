<?php

namespace hcf\item;

use pocketmine\item\{Item,ItemFactory,enchantment\Enchantment};

use pocketmine\entity\Entity;

use hcf\item\{SnowballBass};
class ItemManager {
 
public static function load(): void {
ItemFactory::register(new EnderPearl(), true);
ItemFactory::registerItem(new SnowballBass(), true);
   } 
}