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

x($bug);

function x($bug) {
    $a = 'AAA';
    var_export($bug);
    sleep(60);
}