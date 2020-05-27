<?php

$redis = new \Redis();
$redis->connect('127.0.0.1','6379');
$bug = $redis->hGetAll('bug');
var_export($bug);

foreach($bug as $k => $v) {

}

var_export($bug);
