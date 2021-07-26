<?php


namespace namespace1;

//其中，class_name表示要创建的类名称，一般首字母应大写。大括号内是类的具体定义，可以在其中编写类的属性和方法等成员。
//在类定义中使用关键字var声明变量即创建了类的属性，在类定义中声明函数即创建了类的方法。

class Counter
{
//属性用来表示实体的某一种状态，实际上就是类定义中的变量。通常都是在类的开始位置声明属性，并为其赋初值。
//在PHP中，属性也可以不声明而直接创建并赋值，但不推荐这样使用。
//PHP可以通过对类的成员设置作用域来对访问权限进行限制，使数据分离，增强安全性。
//PHP中的作用域关键字有6个，分别是：abstract、final、private、protected、public和static。
    private $id;
    private $name;
    private $price;
    private static $count = 0;
//大多数类都有称为构造函数的特殊方法，当示例化一个对象时自动调用构造函数，通常执行初始化，比如对成员进行初始化，或者执行一些特殊操作。PHP中构造函数的名称被统一命名为__construct()（前面是双下划线）。
//如果在类中声明一个命名为__construct()的函数，那么该函数将被当成是一个构造函数，并且在建立对象实例时被执行。PHP中每个类最多只允许有一个构造函数。
//创建构造函数的语法格式为：
//    function __construct([arg1, arg2, ..., argn]){
////构造函数体
//}
//旧版本的构造函数使用与类名相同的方法，有些类为了向下兼容，也使用与类名相同的方法做构造函数。
    function __construct($id, $name, $price)
    {
//PHP中，对象操作其属性与方法的引用操作符是“->”，$this是一个代表当前对象的引用。
        //要引用类中的一个属性要使用“->”操作符。属性只属于某一个对象，所以还要指明该属性是属于哪个对象。使用属性的完整语法格式为
        $this->id - $id;
        $this->name = $name;
        $this->price = $price;
    }

//析构函数也有一个统一的命名，__destruct()（前面是双下划线）。
//析构函数允许在使用一个对象之后执行任意代码来清除内存，仅仅释放对象属性所占用的内存并删除对象相关的资源。
//析构函数不接受任何参数
    function __destruct() //析构函数
    {
        self::$count--; //释放时自动执行
    }

    function getCount() //创建一个方法
    {
        return self::$count;
    }

//在PHP中，类的方法（Method）就是在类中定义的函数，这些函数是用来定义类的行为。类中的方法都必须使用一些关键字进行定义。语法格式为：
//scope function method_name() {
////方法体
//}
//其中，scope表示方法的作用域范围，可选值有public、protected和private，如果没有设置，默认为public。method_name表示方法的名称，大括号中表示该方法的执行语句。
//创建一个方法后，就可以通过“对象名->方法名()”格式调用类的公共方法。私有方法不能直接调用。
    function toString()
    {
        echo "编号：$this->id, 名称：$this->name, 价格：$this->price";
    }

//常量：
//在PHP的类中使用const关键字定义常量，常量名称一般都大写，常量名称前面不需要$修饰符。语法格式为：
    const NAME = "VALUE";
//这里，NAME表示常量的名称，VALUE表示常量的值，必须是一个常量表达式。
//类常量类似静态成员，但定义后就不能修改。
    const PI = 3.1415926;

    public function Area($r)
    {
//类常量的访问方式与普通变量不同，在类中访问常量要使用“self::常量名”语法，
        return self::PI * $r * $r;
    }

//static关键字用来声明静态成员。静态的含义就是不用实例化出对象，直接用类名就可以访问。
    static $login = 'ilia', $passwd = '123456';
}

//在外部访问类中的常量则使用“类名::常量名”语法。
$s = new Counter();
echo "PI的值为：" . Counter::PI;
//使用静态成员用::符访问，而不能使用->访问，否则会出错。
echo Counter::$login;
//类是具有某项功能的抽象模型，实际使用时需要对类实例化，对象就是类实例化后的实体。在PHP中定义好类后，便可以使用new关键字实例化一个类的对象。语法格式为：
//其中，$object_name表示要创建的对象名称，class_name是类的名称，跟在类名后面的括号是必须的。
$object_name = new Counter();
//当对象创建完成后，就可以直接调用类的方法和字段。一个类可以有多个对象。
//PHP还可以使用“::”操作符来使用类的属性和方法，而且是没有为类声明任何实例的情况下引用，一般引用的是类的static属性和方法，或者常量。
$num1 = new Counter();
echo $num1->getCount() . " < br />";
$num2 = new Counter();
echo $num2->getCount() . " < br />";
$num2 = null;
echo $num1->getCount();

class Car
{
    var $color;

    function Car($color = "green")
    {
        //以上实例中PHP关键字this就是指向当前对象实例的指针，不指向任何其他对象或类。
        $this->color = $color;
    }

    function what_color()
    {
        return $this->color;
    }
}

/**
 * 获取类中的属性和值
 * @param $obj
 */
function print_vars($obj)
{
    foreach (get_object_vars($obj) as $prop => $val) {
        echo "    $prop = $val";
    }
}

//在 PHP 中，对象必须声明。
//
//首先，你必须使用class关键字声明类对象。类是可以包含属性和方法的结构。
// instantiate one object
$herbie = new Car("white");

// show herbie properties
echo "herbie: Properties";
print_vars($herbie);
echo $herbie->what_color();