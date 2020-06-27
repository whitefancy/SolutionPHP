<!DOCTYPE html>
<html lang="ch">
<title>php demo</title>
<body>

<h1>My first PHP page</h1>

<?php
echo "Hello World!";
echo "PHP 文件通常包含 HTML 标签和一些 PHP 脚本代码。";
?>
<?php
$x=5;
$y=6;
$z=$x+$y;
echo $z;
?>
<?php
//PHP 是一门弱类型语言 以下语句都是合法的
$txt="Hello world!";
$x=5;
$y=10.5;
echo $txt;
$x=$txt;
echo $x;
$txt=$y;
echo $txt;
?>
</body>
</html>