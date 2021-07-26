<?php
//abs-绝对值
//acos —反余弦
//acosh —反双曲余弦
//asin —反正弦
//asinh —反双曲正弦
//atan2 —两个变量的反正切
//atan —反正切
//atanh —反双曲正切
//base_convert —在任意基数之间转换数字
//bindec —二进制到十进制
//ceil —向上舍入分数
//cos —余弦
//cosh —双曲余弦
//decbin —十进制到二进制
//dechex —十进制到十六进制
//decoct —十进制到八进制
//deg2rad —将以度为单位的数字转换为等效的弧度
//exp —计算e的指数
//expm1 —返回exp（number）-1，即使number的值接近于零，也以准确的方式计算
//fdiv —根据IEEE 754除以两个数字
//底—向下舍入小数
//fmod —返回参数除法的浮点余数（模）
//getrandmax —显示最大可能的随机值
//hexdec —十六进制到十进制
//hypot —计算直角三角形的斜边的长度
//intdiv —整数除法
//is_finite —查找值是否为合法的有限数
//is_infinite —查找值是否为无限
//is_nan —查找值是否不是数字
//lcg_value —组合线性同余生成器
//log10 —以10为底的对数
//log1p —返回log（1 + number），即使数字的值接近于零，也以准确的方式计算
//log-自然对数
//max —查找最大值
//min —查找最小值
//mt_getrandmax —显示最大可能的随机值
//mt_rand —通过Mersenne Twister随机数生成器生成一个随机值
//mt_srand —为Mersenne Twister随机数生成器生成种子
//octdec —八进制到十进制
//pi —获取pi的值
//pow —指数表达式
//rad2deg —将弧度数转换为等效的度数
//rand —生成一个随机整数
//圆角—圆角浮动
//罪-正弦
//sinh —双曲正弦
//sqrt —平方根
//srand —给随机数生成器播种
//棕褐色-切线
//tanh —双曲正切

//x === y	恒等于
//如果 x 等于 y，且它们类型相同，则返回 true	5==="5" 返回 false
$x = 100;
$y = "100";

var_dump($x == $y);
echo "<br>";
var_dump($x === $y);
echo "<br>";
var_dump($x != $y);
echo "<br>";
var_dump($x !== $y);
echo "<br>";

$a = 50;
$b = 90;

var_dump($a > $b);
echo "<br>";
var_dump($a < $b);
//PHP7+ 支持组合比较符

// 整型
echo 1 <=> 1; // 0
echo 1 <=> 2; // -1
echo 2 <=> 1; // 1

// 浮点型
echo 1.5 <=> 1.5; // 0
echo 1.5 <=> 2.5; // -1
echo 2.5 <=> 1.5; // 1

// 字符串
echo "a" <=> "a"; // 0
echo "a" <=> "b"; // -1
echo "b" <=> "a"; // 1

