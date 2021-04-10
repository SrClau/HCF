<?php

namespace hcf;

use pocketmine\plugin\PluginBase;

use pocketmine\entity\Entity;

use pocketmine\utils\{Config,TextFormat as Text;

class HCFLoad extends PluginBase {

public const PLUGIN_VERSION = "1.0.0";

public const BORDER_MAP = 2000;

public const MAX_ALLYS = 3;

public const LEVEL_MAX_Y = 128;

public const LEVEL_LESS_Y = 0;

/**@instance HCFLoad|String null **/  
public static $instance;

public static $kitsManager;

public static $shopManager;

public static $provider;

public $sotw;

public $eotw;

public function onEnable(){
self::$instance = $this;
if($version !== self::PLUGIN_VERSION){
$config->setNested("version", self::PLUGIN_VERSION);
}
}
}
?>