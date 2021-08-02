<?php

//php数组，顾名思义就是PHP中的数组。其特点就是将values映射到keys的类型。
//与其他语言不同的是，PHP中数组的key可以是字符串，而values可以是任意类型。

//在 PHP 中，有三种类型的数组：
array();
//数值数组 - 带有数字 ID 键的数组
//$numbers = [1, 2, 3, 4, 5];
//自动分配 ID 键（ID 键总是从 0 开始）：
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
//人工分配 ID 键：
$cars[0] = "Volvo";
$cars[1] = "BMW";
$cars[2] = "Toyota";
//在 PHP 中，array() 函数用于创建数组：
//关联数组 - 带有指定的键的数组，每个键关联一个值
$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
$age['Peter'] = "35";
$age['Ben'] = "37";
$age['Joe'] = "43";
echo "Peter is " . $age['Peter'] . " years old.";
$age["bu"] = 24;
var_dump($age);
foreach ($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
//统计
//使用 array_sum() 对数组元素进行求和运算，array_product 对数组元素执行乘积运算，或者使用 array_reduce() 处理自定义运算规则：
print_r(array_sum($numbers));// 15
print_r(array_product($numbers));// 120
print_r(array_reduce($numbers, function ($carry, $item) {
    return $carry ? $carry / $item : 1;
}));// 0.0083 = 1/2/3/4/5

$cars = array("Volvo", "BMW", "Toyota");
//count() 函数返回数组中元素的数目。
$arrlength = count($cars);

for ($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo "<br>";
}

// array_count_values()统计数组中值的出现次数，它将返回一个新数组，新数组键名为待统计数组的值，新数组的值为待统计数组值的出现次数：
$things = ['apple', 'apple', 'banana', 'tree', 'tree', 'tree'];
$values = array_count_values($things);
print_r($values);
//为了实现获取出现频率最高的数组元素，我们可以使用 array_count_values()、arsort() 和 array_slice() 这几个函数：
$letters = ['a', 'a', 'a', 'a', 'b', 'b', 'c', 'd', 'd', 'd', 'd', 'd'];
$values = array_count_values($letters);
arsort($values);
$top = array_slice($values, 0, 3);
print_r($top);
//还可以轻易的通过 array_sum() 和 array_map() 函数仅需数行就能完成计算订单的价格：
$order = [
    ['product_id' => 1, 'price' => 99, 'count' => 1],
    ['product_id' => 2, 'price' => 50, 'count' => 2],
    ['product_id' => 2, 'price' => 17, 'count' => 3],
];
$sum = array_sum(array_map(function ($product_row) {
    return $product_row['price'] * $product_row['count'];
}, $order));
print_r($sum);// 250

//array_values() 函数会以索引数组形式返回数组中的值
//array_keys() 则会返回给定数组的键名
//你可以使用 array_unique() 函数用于从数组中获取唯一值元素。注意该函数会保留唯一元素在原数组中的键名
//array_column() 函数可以从多维数组（multi-dimensional）中获取指定列的值，如从 SQL 数据库中获取答案或者 CSV 文件导入数据。只需要传入数组和指定的列名。 PHP 7 开始，array_column 功能更加强大，因为它开始支持 包含对象的数组，所以在处理数组模型时变得更加容易。
//array_filter()用于过滤数组，将待处理数组作为函数的第一个参数，第二个参数是一个匿名函数。如果你希望数组中的元素通过验证则在匿名函数返回 true，否则返回 false。你还可以使用 ARRAY_FILTER_USE_KEY 或 ARRAY_FILTER_USE_BOTH 作为第三参数指定是否将数组的键值或将键值和键名同时作为回调函数的参数。


//使用array_filter（）筛选数组键？
//PHP 5.6引入了第三个参数array_filter()，flag，你可以设置为ARRAY_FILTER_USE_KEY通过键，而不是值进行筛选
$my_array = ['foo' => 1, 'hello' => 'world'];
$allowed = ['foo', 'bar'];
$filtered = array_filter(
    $my_array,
    function ($key) use ($allowed) {
        return in_array($key, $allowed);
    },
    ARRAY_FILTER_USE_KEY
);
//自PHP 7.4引入箭头功能以来，我们可以使其更加简洁：
$my_array = ['foo' => 1, 'hello' => 'world'];
$allowed = ['foo', 'bar'];
$filtered = array_filter(
    $my_array,
    fn($key) => in_array($key, $allowed),
    ARRAY_FILTER_USE_KEY
);
//显然，这不如优雅array_intersect_key($my_array, array_flip($allowed))，但是它确实提供了额外的灵活性，$allowed可以对键执行任意测试，例如可以包含正则表达式模式而不是纯字符串

//unset给定关联数组删除某个键-值对
//要修改某个值，通过其键名给该单元赋一个新值。要删除某键值对，对其调用 unset() 函数。
$arr = array(5 => 1, 12 => 2);
$arr[] = 56;    // This is the same as $arr[13] = 56;
// at this point of the script
$arr["x"] = 42; // This adds a new element to
// the array with key "x"
unset($arr[5]); // This removes the element from the array
unset($arr);    // This deletes the whole array


//array_flip() 函数交换数组中的键值和键名
//PHP 中有关排序的函数都是 引用传值 的，排序成功返回 true 排序失败返回 false。排序的基础函数是 sort() 函数，它执行排序后的结果不会保留原索引顺序。排序函数可以归类为以下几类：
//a 保持索引关系进行排序
//k 依据键名排序
//r 对数组进行逆向排序
//u 使用用户自定义排序规则排序
$numbers = array(4, 6, 2, 22, 11);
sort($numbers);
$arrlength = count($numbers);
for ($x = 0; $x < $arrlength; $x++) {
    echo $numbers[$x];
    echo "<br />";
}
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

//数组处理的艺术是组合使用这些数组函数。这里我们通过 array_filter() 和 array_map() 函数仅需一行代码就可以完成空字符截取和去空值处理：
$values = ['say', ' bye', '', ' to', ' spaces ', ' '];
$words = array_filter(array_map('trim', $values));
print_r($words);// ['say', 'bye', 'to', 'spaces']

//多维数组 - 包含一个或多个数组的数组


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

//生成
//array_combine()用于通过使用一个数组的值作为其键名，另一个数组的值作为其值来创建一个全新数组
//在 PHP 中合并数组的最佳方式是使用 array_merge() 函数。所有的数组选项会合并到一个数组中，具有相同键名的值会被最后一个值所覆盖
//有关合并数组操作还有一个「+」号运算符，它和 array_merge() 函数的功能类似都可以完成合并数组运算，但是结果有所不同，可以查看 PHP 合并数组运算符 + 与 array_merge 函数 了解更多细节。
//为了实现从数组中删除不在其他数组中的值（译注：计算差值），使用 array_diff()。还可以通过 array_intersect() 函数获取所有数组都存在的值（译注：获取交集）。
//需要以给定值生成固定长度的数组，可以使用 array_fill() 函数：
$bind = array_fill(0, 5, '?');
print_r($bind);
//根据范围创建数组，如小时或字母，可以使用 range() 函数：
$letters = range('a', 'z');
print_r($letters); // ['a', 'b', ..., 'z']
$hours = range(0, 23);
print_r($hours); // [0, 1, 2, ..., 23]
//为了实现获取数组中的部分元素比如，获取前三个元素使用 array_slice() 函数:
$numbers = range(1, 10);
$top = array_slice($numbers, 0, 3);
print_r($top);// [1, 2, 3]

//类型转换
//list() 函数在单次操作中将数组中的值赋值给一组变量。list () 语言结构仅适用于数字索引数组，并默认索引从 0 开始，且无法用于关联数组，这个语言结构结合 preg_split() 或 explode() 这类函数使用效果更佳，如果你无需定义其中的某些值，可以直接跳过一些参数的赋值
//extract() 函数将关联数组导出到变量（符号表）中。注意在处理用户数据（如请求的数据）时 extract() 函数是一个安全的函数，所以此时最好使用更好的 标志类型 如 EXTR_IF_EXISTS 和 EXTR_PREFIX_ALL。
//extract() 函数的逆操作是 compact() 函数，用于通过变量名创建关联数组：
$firstname = "Peter";
$lastname = "Griffin";
$age = "41";

$result = compact("firstname", "lastname", "age");

print_r($result);
//依据模型数组创建 id 和 title 数据字典，我们可以结合使用 array_combine() 和 array_column() 函数：
$models = [$model, $model, $model];
$id_to_title = array_combine(
    array_column($models, 'id'),
    array_column($models, 'title')
);
print_r($id_to_title);
//将数组拼接成url地址参数
$paramurl = http_build_query($param, '', '&');
$httpurl = $url . $paramurl;
echo $httpurl;
//下面是将url参数中的变量解析成数组
$paramarr = parse_url($httpurl);
dump(explode('&', $paramarr['query']));

//数组遍历处理
//通过使用 array_map()，你可以对数组中的每个元素执行回调方法。你可以基于给定的数组传入函数名称或匿名函数来获取一个新数组：

$cities = ['Berlin', 'KYIV', 'Amsterdam', 'Riga'];
$aliases = array_map('strtolower', $cities);
print_r($aliases);// ['berlin', 'kyiv, 'amsterdam', 'riga']
$numbers = [1, -2, 3, -4, 5];
$squares = array_map(function ($number) {
    return $number ** 2;
}, $numbers);
print_r($squares);// [1, 4, 9, 16, 25]
//对于这个函数还有个谣言，无法同时将数组的键名和键值传入到回调函数，但是我们现在要来打破它：
$model = ['id' => 7, 'name' => 'James'];
$res = array_map(function ($key, $value) {
    return $key . ' is ' . $value;
}, array_keys($model), $model);
print_r($res);
// Array
// (
// [0] => id is 7
// [1] => name is James
// )
//array_walk()表现上和 array_map() 类似，但是工作原理完全不同。第一，数组是以引用传值方式传入，所以 array_walk() 不会创建新数组，而是直接修改原数组。所以作为源数组，你可以将数组的值以引用传递方法传入回调函数，数组的键名直接传入就好了：
$fruits = [
    'banana' => 'yellow',
    'apple' => 'green',
    'orange' => 'orange',
];
array_walk($fruits, function (&$value, $key) {
    $value = $key . ' is ' . $value;
});
print_r($fruits);
