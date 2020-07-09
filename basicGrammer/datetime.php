<?php

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
