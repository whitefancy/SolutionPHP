<?php
$servername = "192.168.2.118:3306";
$username = "root";
$password = "hellokoding";
$database ="accountservice";
try{
    $DBH  =  new PDO("mssql:host=$servername;dbname=$database", $username, $password);
}catch (PDOException $e){
    echo $e->getTraceAsString();
}

echo "success";
?>