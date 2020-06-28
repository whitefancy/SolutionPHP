<?php
class MyClass
{
    const constant = '常量值';
    function showConstant() {
        echo  self::constant . PHP_EOL;
    }
}
echo MyClass::constant . PHP_EOL;
$classname = "MyClass";
echo $classname::constant . PHP_EOL; // 自 5.3.0 起
$class = new MyClass();
$class->showConstant();
echo $class::constant . PHP_EOL; // 自 PHP 5.3.0 起
?>

<?php
class Foo {
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}
print Foo::$my_static . PHP_EOL;
$foo = new Foo();
print $foo->staticValue() . PHP_EOL;
?>

<?php
class BaseClass {
    public function test() {
        echo "BaseClass::test() called" . PHP_EOL;
    }

    final public function moreTesting() {
        echo "BaseClass::moreTesting() called"  . PHP_EOL;
    }
}
class ChildClass extends BaseClass {
    public function moreTesting() {
        echo "ChildClass::moreTesting() called"  . PHP_EOL;
    }
}
// 报错信息 Fatal error: Cannot override final method BaseClass::moreTesting()
?>