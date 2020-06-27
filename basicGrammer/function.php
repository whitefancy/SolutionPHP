<?php
//PHP 的真正威力源自于它的函数。 在 PHP 中，提供了超过 1000 个内建的函数。函数是通过调用函数来执行的。 你可以在页面的任何位置调用函数。
function writeName()
{
    echo "Kai Jim Refsnes";
}
echo "My name is ";
writeName();
//PHP 函数 - 添加参数
//不能重载
function writeName1($fname)
{
    echo $fname . " Refsnes.<br>";
}
echo "My name is ";
writeName1("Kai Jim");
echo "My sister's name is ";
writeName1("Hege");
echo "My brother's name is ";
writeName1("Stale");

function writeName2($fname,$punctuation)
{
    echo $fname . " Refsnes" . $punctuation . "<br>";
}
echo "My name is ";
writeName2("Kai Jim",".");
echo "My sister's name is ";
writeName2("Hege","!");
echo "My brother's name is ";
writeName2("Ståle","?");

//如需让函数返回一个值，请使用 return 语句。
function add($x,$y)
{
    $total=$x+$y;
    return $total;
}
echo "1 + 16 = " . add(1,16);
