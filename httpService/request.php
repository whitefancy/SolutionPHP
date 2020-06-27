<html lang="ch">
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Name: <input type="text" name="fname">
    <input type="submit">
</form>

<?php
//PHP $_REQUEST 用于收集HTML表单提交的数据。
$name = $_REQUEST['fname'];
echo $name;
?>

</body>
</html>