<?php

namespace hcf\utils;

//use function gmdate;

class Time {

public static function intToTime(int $value){
return gmdate("i:s", $int);
}

public static function intToTimeFull(int $value){
return gmdate("H:i:s", $int);
}

public static function intToTimeMonth(int $value){
return gmdate("m:i:s", $value);
}
}
?>