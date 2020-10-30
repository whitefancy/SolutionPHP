<?php
$servername = "121.40.155.162:3306";
$username = "pt_dev";
$password = "Hy98ek872";

// 创建连接
$conn = new mysqli($servername, $username, $password);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
echo "连接成功";
?>