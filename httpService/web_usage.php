<?php
// 获取域名或主机地址
echo $_SERVER['HTTP_HOST'] . "
"; #localhost

// 获取网页地址
echo $_SERVER['PHP_SELF'] . "
"; #/blog/testurl.php

// 获取网址参数
echo $_SERVER["QUERY_STRING"] . "
"; #id=5

// 获取用户代理
echo $_SERVER['HTTP_REFERER'] . "
";

// 获取完整的 url
echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
//http://localhost/blog/testurl.php?id=5

// 包含端口号的完整 url
echo 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
//http://localhost:80/blog/testurl.php?id=5

// 只取路径
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"];
echo dirname($url);
//http://localhost/blog
