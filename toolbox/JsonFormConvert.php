<?php
function json2form($val1)
{
    $val1 = str_replace('{', '', $val1);
    $val1 = str_replace('}', '', $val1);
    $val1 = str_replace('"', '', $val1);
    $val1 = str_replace('\\', '', $val1);
    $val1 = str_replace(',', "\n", $val1);
    return $val1;
}

function json2form1($val1)
{
    $params = json_decode($val1, true);
    $keys = array_keys($params);
    $values = array_values($params);
    $size = count($params);
    for ($i = 0; $i < $size; ++$i) {
        echo $keys[$i] . ':' . $values[$i] . "\n";
    }
}

function form2json($string)
{

}

$str = file_get_contents("php://input");
echo json2form($str);
echo "\n\n";
echo json2form1($str);
echo "\n\n";
echo form2json($str);