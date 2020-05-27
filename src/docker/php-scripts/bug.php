<?php

$redis = new \Redis();
$redis->connect('127.0.0.1','6379');
$redis->hSet('bug', 'a', 'A');
$redis->hSet('bug', 'b', 'B');
$redis->hSet('bug', 'c', 'C');
$redis->hSet('bug', 'd', 'D');
$redis->hSet('bug', 'e', 'E');
$redis->hSet('bug', 'f', 'F');
$bug = $redis->hGetAll('bug');

var_export($bug);
foreach($bug as $k => $v) {
    echo "k:{$k} v:{$v}\n";
    var_dump($v);
}
//var_dump($bug['f']);

var_export($bug);