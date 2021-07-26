<?php

function ts2datetime($str)
{
    if (!substr_count($str, "-"))
        return date("Y-m-d H:i:s", $str);
}

function datetime2ts($str)
{
    if (substr_count($str, "-"))
        return strtotime($str);
}

$str = file_get_contents("php://input");
echo ts2datetime($str);
echo "\n\n";
echo datetime2ts($str);