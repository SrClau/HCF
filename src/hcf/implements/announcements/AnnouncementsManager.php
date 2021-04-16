<?php

namespace hcf\implement\announcements;

use pocketmine\Server;

use pocketmine\utils\{Config,TextFormat};

class AnnouncementsManager {
 
public $hcf;

public $announcements = [];

public $AdsActivated = true;

public $recentAnnouncement = "";

public function __construct(HCFLoad $main){
$this->hcf = $main;
/*$main->*/
}

public function getRecentAnnouncement(): string {
  
}

public function addAnnouncement(string $announcement, int $value){

}

public function deleteAnnoucnement(int $value_announcement){
  
}
}