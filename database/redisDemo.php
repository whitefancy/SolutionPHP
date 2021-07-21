<?php

require_once 'redisdrive.php';

//实例化
$redis = redisdrive::getInstance();
$redis = false;
//是否可用判断
if ($redis->redis == false) {
    $redis = false;
    //如果把session存入了redis则在redis不可用时把session切换回文件存储
    ini_set('session.save_handler', 'files');
    ini_set('session.save_path', '/tmp');
} else {
    $redis = true;
    echo "redis connected";
}

//redis判断和数据读取缓存操作设置
if ($redis) {
    //设置redis键
    $redis->key = 'res';
    //获取redis键的值
    $res_mysql = $redis->get();
    //如果没获取到redis键的值得数据则从数据库获取并写入缓存
    if (!$res) {
        //设置生存时间
        $redis->expire = 60 * 60 * 6;
        //设置键
        $redis->key = 'res';

        //数据库获取数据$res

        //获取到数据$res，赋值
        $redis->value = $res;
        //写入到redis中
        $redis->set();
    }
} else {
    //数据库获取数据
}