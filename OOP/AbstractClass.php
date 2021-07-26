<?php

//使用abstract声明一个类Example，那么该类中的方法都是抽象方法。
abstract class AbstractClass
{
    // 强制要求子类定义这些方法
    abstract protected function getValue();

    abstract protected function prefixValue($prefix);

    // 普通方法（非抽象方法）
    public function printOut()
    {
        print $this->getValue() . PHP_EOL;
    }
}

//在PHP中，类继承通过使用extends关键字实现，并且类继承必须是单向继承，即一个类只能有一个基类（父类），但是一个类可以被多个子类继承。
//子类不但可以拥有父类的成员，如方法和属性，还可以拥有自己本身新增的方法，但是子类不能拥有父类的私有成员
class ConcreteClass1 extends AbstractClass
{
    protected function getValue()
    {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreteClass1";
    }
}

//子类可以通过用同样的名字重新声明并覆盖父类的属性和方法，除非父类定义中使用了final关键字。覆盖后，仍然可以通过parent::来访问被覆盖的方法。
class ConcreteClass2 extends AbstractClass
{
    public function getValue()
    {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') . PHP_EOL;
$class2 = new ConcreteClass2;
$class2->printOut();
echo $class2->prefixValue('FOO_') . PHP_EOL;
?>