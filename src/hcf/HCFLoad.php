<?php

namespace hcf;

use pocketmine\plugin\PluginBase;

use pocketmine\entity\Entity;

use pocketmine\utils\{Config,TextFormat as Text};

use hcf\HCFListener;

use hcf\tasks\MOTDTask;

use muqsit\invmenu\InvMenuHandler;

class HCFLoad extends PluginBase {

public const GAME_MODE = "HardcoreFactions"; //change to your liking

public const PLUGIN_VERSION = "1.0.0"; //change to your liking

public const BORDER_MAP = 2000; //FIX: error when resizing the border to your liking

public const MAX_PROTECTION = 1; //change to your liking

public const MAX_SHARPNESS = 1; //change to your liking

public const MAX_POWER = 1; //change to your liking

public const MAX_ALLYS = 3; //change to your liking

public const LEVEL_MAX_Y = 128;

public const LEVEL_LESS_Y = 0;

/** @instance HCFLoad|String null **/  
public static $instance;

public static $kitsManager;

public static $shopManager;

public static $cratesManager;

public static $factionManager;

public static $yaml;

public static $sql;

public $sotw;

public $eotw;

public function onLoad(): void {

}

public function onEnable(){
self::$instance = $this;
@mkdir($this->getDataFolder());
@mkdir($this->getDataFolder() . "crates/");
@mkdir($this->getDataFolder() . "players/");
@mkdir($this->getDataFolder() . "signs/");
@mkdir($this->getDataFolder() . "data/");
if(!InvMenuHandler::isRegistered()) {
InvMenuHandler::register($this);
}
if(!is_file($this->getDataFolder() . "config.yml")){
$this->saveResource("config.yml");
}
if(!is_file($this->getDataFolder() . "listcrates.yml")){
$this->saveResource("listcrates.yml");
}
if(!is_file($this->getDataFolder() . "listitems.yml")){
$this->saveResource("listitems.yml");
}
if(!is_file($this->getDataFolder() . "messages.yml")){
$this->saveResource("messages.yml");
}
if(!is_file($this->getDataFolder() . "scoreboard.json")){
$this->saveResource("scoreboard.json");
}
self::$yaml = new YamlProvider($this);
//self::$sql = new MySQLProvider($this);

$config = $this->getConfig();
$version = $config->getNested("version");
if($version !== self::PLUGIN_VERSION && self::PLUGIN_VERSION != $this->getDescription()->getVersion()){
$config->setNested("version", self::PLUGIN_VERSION);
$this->getServer()->getPluginManager()->disablePlugin($this);
}
$this->getServer()->getPluginManager()->registerEvents(new HCFListener($this), $this);
$this->getScheduler()->scheduleRepeatingTask(new MOTDTask($this, $config->get("server-name"), $config->get("message-motd")), 3600);
}

public function setEOTW(bool $value = false){
$this->eotw = $value;
}

public function getEOTW(): bool {
return $this->eotw;  
}

public function getTimeSOTW(): int {
return $this->sotw; 
}

public function setTimeSOTW(){
$this->sotw = time();
}
}
?>