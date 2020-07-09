<?php

//php数组，顾名思义就是PHP中的数组。其特点就是将values映射到keys的类型。
//与其他语言不同的是，PHP中数组的key可以是字符串，而values可以是任意类型。


array();
//在 PHP 中，有三种类型的数组：

//数值数组 - 带有数字 ID 键的数组
//自动分配 ID 键（ID 键总是从 0 开始）：
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
//人工分配 ID 键：
$cars[0]="Volvo";
$cars[1]="BMW";
$cars[2]="Toyota";
//获取数组的长度 - count() 函数
echo count($cars);
//遍历数值数组

$cars = array("Volvo", "BMW", "Toyota");
$arrlength = count($cars);

for ($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo "<br>";
}
//在 PHP 中，array() 函数用于创建数组：
//关联数组 - 带有指定的键的数组，每个键关联一个值
$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
$age['Peter']="35";
$age['Ben']="37";
$age['Joe']="43";
echo "Peter is " . $age['Peter'] . " years old.";


$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
var_dump($age);
$age["bu"]=24;
var_dump($age);
foreach ($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}


//多维数组 - 包含一个或多个数组的数组


//PHP - 数组排序函数
//sort() - 对数组进行升序排列
//
//rsort() - 对数组进行降序排列
//
//asort() - 根据关联数组的值，对数组进行升序排列
//
//ksort() - 根据关联数组的键，对数组进行升序排列
//
//arsort() - 根据关联数组的值，对数组进行降序排列
//
//krsort() - 根据关联数组的键，对数组进行降序排列

$numbers = array(4, 6, 2, 22, 11);
sort($numbers);
$arrlength = count($numbers);
for ($x = 0; $x < $arrlength; $x++) {
    echo $numbers[$x];
    echo "<br />";
}

$array = array(
    "foo" => "bar",
    42 => 24,
    "multi" => array(
        "dimensional" => array(
            "array" => "foo"
        )
    )
);

var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);
//自 PHP 5.4 起可以用直接对函数或方法调用的结果进行数组解引用，在此之前只能通过一个临时变量。
//
//自 PHP 5.5 起可以直接对一个数组原型进行数组解引用。
function getArray()
{
    return array(1, 2, 3);
}

// on PHP 5.4
$secondElement = getArray()[1];

// previously
$tmp = getArray();
$secondElement = $tmp[1];

// or
list(, $secondElement) = getArray();

//如果 $arr 还不存在，将会新建一个，这也是另一种新建数组的方法。不过并不鼓励这样做，
//因为如果 $arr 已经包含有值（例如来自请求变量的 string）则此值会保留而 [] 实际上代表着字符串访问运算符。初始化变量的最好方式是直接给其赋值。
//
//要修改某个值，通过其键名给该单元赋一个新值。要删除某键值对，对其调用 unset() 函数。
$arr = array(5 => 1, 12 => 2);

$arr[] = 56;    // This is the same as $arr[13] = 56;
// at this point of the script

$arr["x"] = 42; // This adds a new element to
// the array with key "x"

unset($arr[5]); // This removes the element from the array

unset($arr);    // This deletes the whole array
