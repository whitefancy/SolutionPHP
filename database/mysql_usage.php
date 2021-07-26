<?php
$servername = "192.168.2.118:3306";
$username = "root";
$password = "hellokoding";
$database = "accountservice";
// 创建连接
$conn = new mysqli($servername, $username, $password, $database);

// 检测连接
if ($conn->connect_error) {
    die("fail: " . $conn->connect_error);
}
echo "success";


$mysqli = null;

function _mysqlEscapeString($unescaped_string)
{
    global $mysqli;
    if (!isset($mysqli)) sql_connect();
    return $mysqli->escape_string($unescaped_string);
}

function sql_query($sql)
{
    $starttime = microtime(true);
    global $mysqli;
    if (!isset($mysqli)) {
        sql_connect();
    }
    $result = $mysqli->query($sql);
    if (!$result) {
        if (!$mysqli->ping()) {
            Logger::logWarning(basename(__FILE__, ".php"), 'sql_connect', $mysqli->error, DATABASE_LOG_NAME);
            throw new Exception("ERROR: Could not connect to database ");
        }
        $mysqli->close();
    }
    $endtime = microtime(true);
    $lasttime = (int)(($endtime - $starttime) * 1000);
    if ($lasttime >= 300) {
        $executeTimeInfo = $sql . "#" . $lasttime . "#" . time();
        Logger::logWarning(basename(__FILE__, ".php"), 'dbquery', $executeTimeInfo, DATABASE_LOG_NAME);
    }
    return $result;
}

function sql_check($sql)
{
    $res = sql_query($sql);
    return $res->num_rows > 0;
}

// 没有结果的话是FALSE
function sql_fetch_one($sql)
{
    $res = sql_query($sql);
    try {
        $data = $res->fetch_array();
    } catch (Exception $e) {
        Logger::logWarning(basename(__FILE__, ".php"), 'sql_fetch_one', $e->getTraceAsString(), DATABASE_LOG_NAME);
        throw new Exception("sql fetch one ERROR:" . $e->getMessage());
    }
    $res->free();
    return $data;
}

function sql_fetch_ones($sql)
{
    $res = sql_query($sql);

    $data = array();
    while ($row = $res->fetch_row()) {
        $data[] = $row[0];
    }
    $res->free();
    return $data;
}

function sql_fetch_rows($sql)
{
    $res = sql_query($sql);

    $data = array();
    while ($row = $res->fetch_assoc()) {
        $data[] = $row;
    }
    $res->free();
    return $data;
}


function sql_fetch_one_cell($sql)
{
    $result = sql_query($sql);

    if ((!empty($result)) && ($row = $result->fetch_row())) {
        $result->free();
        return $row[0];
    } else {
        $result->free();
        return false;
    }
    return 0;
}


function sql_insert($sql)
{
    global $mysqli;
    if (!isset($mysqli)) {
        sql_connect();
    }
    $result = sql_query($sql);
    return $mysqli->insert_id;
}


function sql_update($sql)
{
    global $mysqli;
    $result = sql_query($sql);
    return $mysqli->affected_rows;
}

function sql_connect($host = DB_HOST, $username = DB_USERNAME, $password = DB_PASSWORD, $database = DB_DATABASE)
{
    global $mysqli;
    $mysqli = new mysqli($host, $username, $password, $database);
    $try_time = 0;
    //失败重试
    while ($mysqli === false && $try_time < retries_count) {
        sleep(conn_timeout);
        $mysqli = new mysqli($host, $username, $password, $database);
        $try_time += 1;
    }
    if ($mysqli->connect_error) {
        Logger::logWarning(basename(__FILE__, ".php"), 'sql_connect', $mysqli->connect_error, DATABASE_LOG_NAME);
        throw new Exception('ERROR: Could not connect MySQL.');
    }
    $mysqli->query("SET NAMES 'utf8'");
}

/**
 * 根据要插入的数据和表 ，拼接insert字符串
 * @param $data 待插入数据
 * @param $table 目标table
 * @return string 返回拼接好的mysql字符串
 */
function generate_insert_sql($data0, $table)
{
    $data = GameOrder::jsonArray2sql($data0);
    $str = "INSERT INTO `" . $table . "`(`";
    $size = count($data);
    $keys = array_keys($data);
    for ($i = 0; $i < $size - 1; ++$i) {
        $str = $str . $keys[$i] . "`,`";
    }
    $str = $str . $keys[$size - 1] . "`) values('";
    $values = array_values($data);
    for ($i = 0; $i < $size - 1; ++$i) {
        $str = $str . $values[$i] . "','";
    }
    $str = $str . $values[$size - 1] . "');";
    Logger::logDebug("mysql_service", __FUNCTION__, $str, PAY_LOG_NAME);
    return $str;

}

/**
 * @param $table
 * @param $set_data
 * @param $where_data
 * @return string
 */
function generate_update_sql($table, $set_data, $where_data)
{
    $data = GameOrder::jsonArray2sql($set_data);
    $data1 = GameOrder::jsonArray2sql($where_data);
    $str = "UPDATE `" . $table . "` SET `";
    $size = count($data);
    $keys = array_keys($data);
    $values = array_values($data);
    for ($i = 0; $i < $size - 1; ++$i) {
        $str = $str . $keys[$i] . "`='" . $values[$i] . "\',`";
    }
    $str = $str . $keys[$size - 1] . "`='" . $values[$i] . "\' WHERE `";
    $size = count($data1);
    $keys = array_keys($data1);
    $values = array_values($data1);
    for ($i = 0; $i < $size - 1; ++$i) {
        $str = $str . $keys[$i] . "`='" . $values[$i] . "\' and `";
    }
    $str = $str . $keys[$size - 1] . "`='" . $values[$i] . "\';";
    return $str;

}