<?php
//require_once 'redisdrive.php';

try {
    $redis = new Redis();
    $redis->connect('192.168.2.118', 6379);
    $redis->set('name', 'Redis is Installed');
    echo $glueStatus = $redis->get('name');

} catch (Exception $ex) {
    echo $ex->getMessage();
}