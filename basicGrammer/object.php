<?php
class Car
{
    var $color;
    function Car($color="green") {
        //以上实例中PHP关键字this就是指向当前对象实例的指针，不指向任何其他对象或类。
        $this->color = $color;
    }
    function what_color() {
        return $this->color;
    }
}

function print_vars($obj) {
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
echo "herbie: Properties
";
print_vars($herbie);
echo $herbie->what_color();
