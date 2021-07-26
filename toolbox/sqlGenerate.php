<?php

function selectRows($table, $key, $value, $value1)
{
    echo "SELECT * FROM " . $table . " limit 3;\n";
    echo "SELECT * FROM " . $table . " where " . $key . "=" . $value . " limit 3;\n";
    echo "SELECT * FROM " . $table . " where " . $key . ">" . $value . " and " . $key . "<" . $value1 . " limit 3;\n";
}

$table = "";
$key = "";
$value = "";
$value1 = "";
if (isset ($_POST ['table'])) {
    $table = $_POST['table'];
}
if (isset ($_POST ['key'])) {
    $key = $_POST['key'];
}
if (isset ($_POST ['value'])) {
    $value = $_POST['value'];
}
if (isset ($_POST ['value1'])) {
    $value1 = $_POST['value1'];
}
selectRows($table, $key, $value, $value1);