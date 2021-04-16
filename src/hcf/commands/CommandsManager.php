<?php

namespace hcf\commands;

use pocketmine\Server;

use hcf\HCFLoad;

class CommandsManager {

public static function init(): void {
$instance = HCFLoad::getInstance();
$server = $instance->getServer();
$command = $server->getCommandMap();
$command->register("staffmode", new StaffModeCommand($instance));
}
}