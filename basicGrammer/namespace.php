<?php
//命名空间是一种封装事物的方法。命名空间一个最明确的目的就是解决重名问题，PHP中不允许两个函数或者类出现相同的名字，否则会产生一个致命的错误。
//PHP 命名空间(namespace)是在PHP 5.3中加入的
//1.用户编写的代码与PHP内部的类/函数/常量或第三方类/函数/常量之间的名字冲突。
//
//2.为很长的标识符名称(通常是为了缓解第一类问题而定义的)创建一个别名（或简短）的名称，提高源代码的可读性。

//可以在同一个文件中定义不同的命名空间代码
//namespace MyProject1;
// MyProject1 命名空间中的PHP代码
//namespace MyProject2;
// MyProject2 命名空间中的PHP代码
// 另一种语法
declare(encoding='UTF-8'); //定义多个命名空间和不包含在命名空间中的代码
namespace MyProject {//命名空间必须是程序脚本的第一条语句
    const CONNECT_OK = 1;
    class Connection { /* ... */ }
    function connect() { /* ... */  }
}
namespace { // 全局代码
    session_start();
    $a = MyProject\connect();
    echo MyProject\Connection::start();
}
//与目录和文件的关系很象，PHP 命名空间也允许指定层次化的命名空间的名称。因此，命名空间的名字可以使用分层次的方式定义

namespace MyProject\Sub\Level {
    const CONNECT_OK = 1;
    class Connection
    { /* ... */
    }

    function Connect()
    { /* ... */
    }
}
//声明分层次的单个命名空间

