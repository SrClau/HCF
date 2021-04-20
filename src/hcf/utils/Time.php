<?php

namespace hcf\utils;

class Time {

public static function intToTime(int $value){
return gmdate("i:s", $int);
}

public static function intToTimeFull(int $value){
return gmdate("H:i:s", $int);
}
}
?>