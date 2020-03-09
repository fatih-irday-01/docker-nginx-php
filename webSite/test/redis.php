<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$redis = new Redis();
$redis->connect('redis', 6379);
$redis->set("tutorial-name", "Redis deneme value");
echo $redis->get("tutorial-name");