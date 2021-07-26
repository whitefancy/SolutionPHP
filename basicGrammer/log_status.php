<?php
//php执行信息（日志打印用）
echo '__LINE__';//魔术变量之__LINE__记录了当前执行的代码所在行的行号。
//__LINE__ 文件中的当前行号。
//__FILE__ 文件的完整路径和文件名。如果用在被包含文件中，则返回被包含的文件名。
//自 PHP 4.0.2 起，__FILE__ 总是包含一个绝对路径（如果是符号连接，则是解析后的绝对路径），而在此之前的版本有时会包含一个相对路径。
//__DIR__ 文件所在的目录。如果用在被包括文件中，则返回被包括的文件所在的目录。
//它等价于dirname(__FILE__)。除非是根目录，否则目录中名不包括末尾的斜杠。（PHP 5.3.0中新增） =
echo basename(__FILE__);
echo dirname(__DIR__);
//    __FUNCTION__ 函数名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该函数被定义时的名字（区分大小写）。在 PHP 4 中该值总是小写字母的。
//__CLASS__ 类的名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该类被定义时的名字（区分大小写）。在 PHP 4 中该值总是小写字母的。
//__METHOD__ 类的方法名（PHP 5.0.0 新加）。返回该方法被定义时的名字（区分大小写）。
//__NAMESPACE__ 当前命名空间的名称（大小写敏感）。这个常量是在编译时定义的（PHP 5.3.0 新增）
define("REQUEST_ID", session_create_id());
function writeLog($logLevel, $class, $method, $message, $serverName = PAY_LOG_NAME)
{
    $filename_path = LOG_ROOT . $serverName . date('Ymd') . '.log';
    $logString = date('Y-m-d H:i:s') . ' | ' . REQUEST_ID . ' | ' . $logLevel . ' |[ ' . $class . ' , ' . $method . ' ]| ' . $message . "\n";
    file_put_contents($filename_path, $logString, FILE_APPEND);
}

Logger::logInfo(basename(__FILE__, ".php"), "response", "d", PAY_LOG_NAME);
Logger::logInfo(__CLASS__, __METHOD__, "d", PAY_LOG_NAME);
