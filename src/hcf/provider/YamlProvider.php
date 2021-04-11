<?php

namespace hcf\provider;

use pocketmine\utils\Config;

use hcf\HCFLoad;

class YamlProvider {
 
/** @here HCFLoad **/ 
public $load = null;

public function __construct(HCFLoad $main){
$this->load = $main;
$this->init();
}

public function init(): void {
if(!is_dir($this->load->getDataFolder() . "crates/")){
  
}
}
}
?>