<?php
//PHP安装redis扩展
//开始在 PHP 中使用 Redis 前， 我们需要确保已经安装了 redis 服务及 PHP redis 驱动，且你的机器上能正常使用 PHP。
// 接下来让我们安装 PHP redis 驱动：下载地址为:https://github.com/phpredis/phpredis/releases。
//以下操作需要在下载的 phpredis 目录中完成：
//$ wget https://github.com/phpredis/phpredis/archive/3.1.4.tar.gz
//$ cd phpredis-3.1.4 # 进入 phpredis 目录
//$ /usr/local/php/bin/phpize # php安装后的路径
//$ ./configure --with-php-config=/usr/local/php/bin/php-config
//$ make && make install
//修改php.ini文件
//vi /usr/local/php/lib/php.ini
//增加如下内容:
//extension_dir = "/usr/local/php/lib/php/extensions/no-debug-zts-20090626"
//extension=redis.so
//安装完成后重启php-fpm 或 apache。查看phpinfo信息，就能看到redis扩展。
//extension=php_redis.dll

try {
    $redis = new Redis();
    $redis->connect('192.168.2.118', 6379);
    $redis->set('name', 'Redis is Installed');
    echo $glueStatus = $redis->get('name');

} catch (Exception $ex) {
    echo $ex->getMessage();
}
//查看服务是否运行
echo "Server is running: " . $redis->ping();
//设置 redis 字符串数据
$redis->set("tutorial-name", "Redis tutorial");
// 获取存储的数据并输出
echo "Stored string in redis:: " . $redis->get("tutorial-name");

//存储数据到列表中
$redis->lpush("tutorial-list", "Redis");
$redis->lpush("tutorial-list", "Mongodb");
$redis->lpush("tutorial-list", "Mysql");
// 获取存储的数据并输出
$arList = $redis->lrange("tutorial-list", 0, 5);
echo "Stored string in redis";
print_r($arList);

// 获取数据并输出
$arList = $redis->keys("*");
echo "Stored keys in redis:: ";
print_r($arList);

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