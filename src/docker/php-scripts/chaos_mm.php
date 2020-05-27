<?php


function main(){
    $redis = new \Redis();
    $redis->connect('127.0.0.1','6379');
    $bug = $redis->hGetAll('bug');

    foreach($bug as $k => $v){
    }

    $_bug = ['a'=>'A', 'b'=>'B', 'c'=>'C' , 'd'=>'D', 'e' => 'E', 'f' => 'shit'];

    var_export($bug);
    var_export($_bug);
}

main();