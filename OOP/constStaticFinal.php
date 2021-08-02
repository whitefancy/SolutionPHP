<?php

class MyClass
{
    const constant = '常量值';

    function showConstant()
    {
        echo self::constant . PHP_EOL;
    }
}

echo MyClass::constant . PHP_EOL;
$classname = "MyClass";
echo $classname::constant . PHP_EOL; // 自 5.3.0 起
$class = new MyClass();
$class->showConstant();
echo $class::constant . PHP_EOL; // 自 PHP 5.3.0 起
//作用域关键字：
//PHP可以通过对类的成员设置作用域来对访问权限进行限制，使数据分离，增强安全性。PHP中的作用域关键字有6个，分别是：abstract、final、private、protected、public和static。
//1)Public关键字：
//public关键字修饰的属性或者方法表示它是公共的，即在PHP的任何位置都可以通过对象名来访问该属性和方法。public是属性和方法的默认修饰符。
//2）Private关键字：
//private表示私有，通过private关键字修饰的属性和方法只能在类的内部使用，不能通过类的实例化对象调用，也不能通过类的子类调用。如果某些方法是作为另外一些方法的辅助，可以将该方法声明为私有。在PHP中，访问private修饰的成员时必须使用$this关键字。
//3)Protected关键字：
//protected表示受保护的，只能在类本身和子类中使用。使用protected关键字修饰字段和方法具有保护作用，通常用来帮助类或子类完成内部计算。如果试图从类外部调用protected的成员，将会出现致命性错误。
//4)Final关键字：
//final是PHP5新增的作用域关键字，可以用在类的前面或者方法的前面。当在一个方法的前面加上final关键字，表示该方法不可以被重写，即在该类的子类中只允许调用，不允许重新设置该方法的功能。如果一个类声明了final，那么该类不能被继承。这在不想让他人重新定义你的private方法时很重要。
//5)Static关键字：
//static关键字用来声明静态成员。
//静态成员包括静态方法和静态属性。由于静态方法可以调用非对象示例，所以$this关键字不可以在声明为静态的方法中使用。一个类的静态成员会被该类所有的实例化对象共享，任何一个实例化对象对静态成员的修改都会映射到静态成员中，可以把静态成员看作一个全局变量。
//静态成员与实例化对象无关，只与类有关，用来实现类要封装的功能和数据，但不包括特定对象的功能和数据。类的静态属性非常类似于函数的全局变量。静态方法类似于全局函数。静态方法可以完全访问类的属性，也可以由对象的实例来访问。
//6)Abstract关键字：
//PHP5支持抽象类和抽象方法。任何一个类，如果它里面至少有一个方法被声明为抽象的，那么这个类就必须被声明为抽象的。因为抽象方法只有方法声明，而没有方法的实现，所以抽象类不能直接被实例化，必须先继承该抽象类，实现了所以抽象的方法，然后再实例化子类。
//继承一个抽象类的时候，子类必须实现抽象类中的所有抽象方法，这些方法的可见性必须和抽象中一样。如果抽象类中某个抽象方法被声明为protected，那么子类中实现的方法就应当声明为protected或者public，而不能定义为private。抽象方法的语法格式为：
//抽象类不能够实例化，它的作用类似于接口，就是产生子类的同时给子类一些特定的属性和方法。
class Foo
{
    public static $my_static = 'foo';

    public function staticValue()
    {
        return self::$my_static;
    }
}

print Foo::$my_static . PHP_EOL;
$foo = new Foo();
print $foo->staticValue() . PHP_EOL;
?>

<?php

class BaseClass
{
    public function test()
    {
        echo "BaseClass::test() called" . PHP_EOL;
    }

    final public function moreTesting()
    {
        echo "BaseClass::moreTesting() called" . PHP_EOL;
    }
}

class ChildClass extends BaseClass
{
    public function moreTesting()
    {
        echo "ChildClass::moreTesting() called" . PHP_EOL;
    }
}

// 报错信息 Fatal error: Cannot override final method BaseClass::moreTesting()
?>