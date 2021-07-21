<?php
function load($class){
    $path=$class.".php";
    echo $path;
    if(file_exists($path))
        echo "file exists";
        require ($class.".php");
}
function load_utils($class){
    $path=dir(__DIR__)."\utils\\".$class.".php";
    echo $path;
    if(file_exists($path))
        require ($class.".php");
}
spl_autoload_register("load");
spl_autoload_register("load_utils");
$demo = new TheClass();
$demo1=new AmyClass();

