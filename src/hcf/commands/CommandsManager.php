<?php

namespace hcf\commands;

use pocketmine\Server;

use hcf\HCFLoad;

class CommandsManager {

public static function init(): void {
$instance = HCFLoad::getInstance();
$server = $instance->getServer();
$command = $server->getCommandMap();
/** Staffmode **/
$command->register("staffmode", new StaffModeCommand($instance));
/** HCF Test **/
$command->register("test", new Test($this)) ;
/** Stats **/
$command->register("stats", new StatsCommand($this));

}
}