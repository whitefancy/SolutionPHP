<?php
//处理日期和时间
//createFromFormat从不同格式读取datetime
//把时间戳转换日期可以直接使用date函数来实现
//如果要把日期转换成时间戳可以使用strtotime()函数实现，
$unixtime = time();
strtotime(date("Y-m-d H:i"));
date("Y-m-d H:i", $unixtime);
//php中获得今天零点的时间戳
$todaytime = strtotime("today");
date("Y-m-d H:i", $todaytime);
//时间戳转换函数：
date("Y-m-d H:i:s", time());//"Y-m-d H:i:s"是转换后的日期格式，time()是获得当前时间的时间戳。如果是date("Y-m-d H:i:s",time())，则小时分秒一起显示；如果是
date("Y-m-d ", time());//只显示年月日。
;//打印明天此时的时间戳echo date("Y-m-d H:i:s",strtotime("+1 day"))
echo date("Y-m-d H:i:s", strtotime("-1 day"));
echo date("Y-m-d H:i:s", strtotime("+1 week"));
strtotime("-1 week");
echo date("Y-m-d H:i:s", strtotime("next Thursday"));
echo date("Y-m-d H:i:s", strtotime("last Thursday"));
//时区的设置
//注意：使用到时间戳与date日期设置的时候不要忘记时区的设置：
date_default_timezone_set('PRC'); //设置中国时区

$pts = 1596106558;
$now = time();
echo $now;
$minutes = intval(($now - $pts) / 60);
//echo $minutes;


// 获取当前系统时间并打印
$date = new DateTime();
echo $date->format('Y-m-d H:i:s');

//获取特定时间并打印


$date = new DateTime('2014-05-04');
echo $date->format('Y-m-d H:i:s');
echo "\n";
$date2 = new DateTime('tomorrow');
echo $date2->format('Y-m-d H:i:s');
echo "\n";
$date2 = new DateTime('+2 days');
echo $date2->format('Y-m-d H:i:s');


$date = new DateTime();
// add方法
$date->add(new DateInterval('P1D'));
echo $date->format('Y-m-d H:i:s');
echo "\n";
// modify方法
$date->modify('+1 day');
echo $date->format('Y-m-d H:i:s');
echo "\n";
// setDate方法
$date->setDate('1989', '11', '10');
echo $date->format('Y-m-d H:i:s');
echo "\n";
// setTime方法
$date->setTime('11', '10', '10');
echo $date->format('Y-m-d H:i:s');
echo "\n";


//unix时间戳的转换


$date = new DateTime();
echo $date->format('U');
echo "\n";


$date = new DateTime();
echo $date->getTimestamp();
echo "\n";

//将时间戳转换为可读时间

$date = new DateTime('@1408950651');
$date->setTimezone(new DateTimeZone('Asia/Shanghai'));
echo $date->format('Y-m-d H:i:s');
echo "\n";


$date = new DateTime();
$date->setTimestamp(1408950651);
echo $date->format('Y-m-d H:i:s');
echo "\n";

//日期的比较

$date1 = new DateTime();
$date2 = new DateTime('2014-09-15');

if ($date1 < $date2) {
    echo $date2->format('Y-m-d H:i:s') . ' is in the future';
}

//日期间隔
$date1 = new DateTime();
$date2 = new DateTime('2014-09-15');

$diff = $date1->diff($date2);
print_r($diff);

$date1 = new DateTime();
$date2 = new DateTime('2014-09-15');

$diff = $date1->diff($date2);
echo $diff->format("The future will come in %Y years %m months and %d days");


echo gmdate("ymd");

echo '\n';
date_default_timezone_set("Etc/GMT-7");
echo date("ymd");
echo (new DateTime())->format('Y-m-d H:i:s');