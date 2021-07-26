<?php
$servername = "192.168.2.118:3306";
$username = "root";
$password = "hellokoding";
$database ="accountservice";
// 创建连接
$conn = new mysqli($servername, $username, $password, $database);

// 检测连接
if ($conn->connect_error) {
    die("fail: " . $conn->connect_error);
}
echo "success";
?>