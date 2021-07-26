<?php
$t = date("H");
echo $t;
if ($t < "10") {
    echo "Have a good morning!";
} elseif ($t < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}

$favcolor = "red";
switch ($favcolor) {
    case "red":
        echo "你喜欢的颜色是红色!";
        break;
    case "blue":
        echo "你喜欢的颜色是蓝色!";
        break;
    case "green":
        echo "你喜欢的颜色是绿色!";
        break;
    default:
        echo "你喜欢的颜色不是 红, 蓝, 或绿色!";
}

$i = 1;
while ($i <= 5) {
    echo "The number is " . $i . "<br>";
    $i++;
}

$i = 1;
do {
    $i++;
    echo "The number is " . $i . "<br>";
} while ($i <= 5);

for ($i = 1; $i <= 5; $i++) {
    echo "The number is " . $i . "<br>";
}

$x = array("one", "two", "three");
foreach ($x as $value) {
    echo $value . "<br>";
}

//判断变量是否存在
//变量未定义
//empty,isset首先都会检查变量是否存在，然后对变量值进行检测
//is_null()和“参数本身”是不允许作为参数判断的，会报Notice警告错误
//已定义
//isset()：仅当null和未定义，返回false；
//empty()：""、0、"0"、NULL、FALSE、array(),未定义，均返回false；
//is_null()：仅判断是否为null
//变量本身作为参数，与empty()一致，但接受未定义变量时，报警告
