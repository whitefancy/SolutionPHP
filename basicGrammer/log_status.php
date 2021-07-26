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

define("PAY_LOG_NAME", "pay_log");
define("ACCOUNT_LOG_NAME", "account_log");
define('OPERATION_LOG_NAME', 'operation_log');
define('DATABASE_LOG_NAME', 'database_log');
define("REQUEST_ID", session_create_id());

class Logger
{
    /**
     * 日志格式
     * 时间戳 | 请求id | 日志级别 | [ 文件名/类名， 函数名/方法名] | 日志信息
     *2021-07-23 09:23:06 | cm8nng7em38tdsd505q6m0hv5m | warning |[ mysql_service , sql_connect ]| Access denied for user 'root1'@'172.18.0.1' (using password: YES)
     * @param $logLevel 日志级别
     * @param $class 文件名/类名
     * @param $method 函数名/方法名
     * @param $message 日志信息
     * @param string $serverName 日志类型
     */
    private static function writeLog($logLevel, $class, $method, $message, $serverName = PAY_LOG_NAME)
    {
        if (DEBUG_MODE == 0 && 'debug' == $logLevel) {
            return;
        }
        $logString = date('Y-m-d H:i:s') . ' | ' . REQUEST_ID . ' | ' . $logLevel . ' |[ ' . $class . ' , ' . $method . ' ]| ' . $message . "\n";
        $path = LOG_ROOT . date('Ym') . '/' . $serverName;
        if (is_dir($path) || mkdir($path, 0777, true)) {
            if ('info' == $logLevel || 'debug' == $logLevel) {
                $filename_path = $path . '/' . $serverName . '_' . date('Ymd') . '.log';
            } else {
                $filename_path = $path . '/' . $serverName . '_' . $logLevel . '.log';
            }
            file_put_contents($filename_path, $logString, FILE_APPEND);
        }
    }

    static function logError($class, $method, $message, $serverName)
    {
        Logger::writeLog('error', $class, $method, $message, $serverName);
    }

    static function logWarning($class, $method, $message, $serverName)
    {
        Logger::writeLog('warning', $class, $method, $message, $serverName);
    }

    static function logInfo($class, $method, $message, $serverName)
    {
        Logger::writeLog('info', $class, $method, $message, $serverName);
    }

    static function logDebug($class, $method, $message, $serverName)
    {
        Logger::writeLog('debug', $class, $method, $message, $serverName);
    }

    static function logIp()
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? '';
        Logger::writeLog('info', "request", "ip", $ip, PAY_LOG_NAME);
    }
}


Logger::logInfo(basename(__FILE__, ".php"), "response", "d", PAY_LOG_NAME);
Logger::logInfo(__CLASS__, __METHOD__, "d", PAY_LOG_NAME);
