<?php
// 接口类通过interface关键字来声明，接口中声明的方法必须是抽象方法，
//不能声明变量，只能使用const关键字声明为常量的成员属性，并且接口中的所有成员都必须具备public访问权限。
interface iTemplate
{
    const CONSTANT = 'CONSTANT value';

    public function setVariable($name, $var);

    public function getHtml($template);
}

//接口类不能实例化操作，需要通过子类来实现。但接口可以直接使用接口名称在接口外获取常量成员的值
// 实现接口
class Template implements iTemplate
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach ($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}

//因为接口类不能实例化，要使用接口中的成员就必须借助子类。在子类中继承接口需要使用implements关键字。如果要实现多个接口的继承，那么每个接口之间必须使用逗号连接。
//ArrayAccess是PHP自带的一个接口，可以通过一个数组接口访问对象的数据，其中有4个方法：
//·offsetExists($key)：测试值是否存在。
//·offsetGet($key)：找回值。
//·offsetSet($key,$value)：赋值给$key。
//·offsetUnset($key)：移除指定值。
class temp1 implements iTemplate
{

    public function setVariable($name, $var)
    {
        // TODO: Implement setVariable() method.
    }

    public function getHtml($template)
    {
        // TODO: Implement getHtml() method.
    }
}

//InstanceOf操作用来检查一个对象是否基于一个特定的类。示例：
class foo
{
}

$a = new foo;
if ($a instanceof foo) {
    useFoo($a);
}

//使用clone可以创建多个有相同的语法结构的不同的类。示例：
class A
{
    public $foo;
}

$a = new A;
$a_copy = clone $a;
$a_another = clone($a);

//在基类创建一个__clone()方法，这个方法可以在这个类执行克隆操作时执行。示例：
class A1
{
    public $is_copy = false;

    public function __clone()
    {
        this->$is_copy = true;
}
}

$a = new A1;
$b = clone $a;
var_dump($a->is_copy, $b->is_copy);
//__clone()方法可以对克隆后的副本对象重新初始化，不需要任何参数，
//其中自动包含$this和$that两个对象引用，$this是副本对象的引用，$that是原对象的引用。
//比较对象：
//当使用比较操作符“==”来比较对象时，如果两个对象拥有相同的属性和值，并且都是同一个类的实例，那么这两个类将认为是相等的。示例：
$a = new A;
$b = new A;
$c = new A;
$c->foo = 2;
$d = new StadClass;
echo (int)($a == $b); //1
echo (int)($a == $c); //0
echo (int)($a == $d); //0
//使用比较符“===”来比较两个对象时，两个对象只有在同为一个对象的引用时才相等。示例：
$a = new A;
$b = new A;
$c = clone $b;
$d = $a;
echo (int)($a === $b); //0
echo (int)($a === $c); //0
echo (int)($a === $d); //1
