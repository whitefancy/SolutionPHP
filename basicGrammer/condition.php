<?php
//如果当前时间小于 20，下面的实例将输出 "Have a good day!"：

$t = date("H");
echo $t;
if ($t<"10")
{
    echo "Have a good morning!";
}
elseif ($t<"20")
{
    echo "Have a good day!";
}
else
{
    echo "Have a good night!";
}
?>
<?php
$favcolor="red";
switch ($favcolor)
{
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

$i=1;
while($i<=5)

{

    echo "The number is " . $i . "<br>";

    $i++;

}
?>
<?php
$i=1;
do

{

    $i++;

    echo "The number is " . $i . "<br>";

}
while ($i<=5);
?>
<?php
for ($i=1; $i<=5; $i++)

{

    echo "The number is " . $i . "<br>";

}
$x=array("one","two","three");
foreach ($x as $value)

{

    echo $value . "<br>";

}
?>