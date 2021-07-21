<?php
class MyAutoloader
{
    public static function load($class){
        require ($class.".php");
    }
    public static function load_utils($class){
        require ("utils\\".$class.".php");
    }
}
spl_autoload_register("load");
$demo = new TheClass();
$demo1=new AmyClass();