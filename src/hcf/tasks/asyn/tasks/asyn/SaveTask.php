<?php

namespace hcf\tasks\asyn;

use hcf\{HCFLoad,PlayerHCF};

use pocketmine\scheduler\AsyncTask;

use pocketmine\Server;

use pocketmine\utils\TextFormat;

class SaveTask extends AsyncTask {
/** @here string **/
private $name = "";
/** @here array **/
private $kits;
/** @here array **/
private $data;
/** @here array **/
private $cooldown;
/** @here array **/
private $pvp;
/** 
* @constructor SaveTask
* @param $name string
* @param $kits array
* @param $data array
* @param $cooldown array
* @param $pvp array
**/
public function __construct(string $name, array $kits, array $data, array $cooldown, array $pvp){
$this->name = $name;
$this->kits = $kits;
$this->data = $data;
$this->cooldown = $cooldown;
$this->pvp = $pvp;
}

public function onRun(): void {

}
}
?>