<?php

function platform_verify($loginId, $loginSession, $platform, $channel)
{
    $account = $channel . "_" . $loginId;
    return array(1, $account, $loginSession);
}

//$ret = platform_verify("deviceid_b1a48fe9-24a0-4201-96e1-9839d000da3b", "1602213100295", "googleplay", "googleplay");
//echo json_encode($ret);
?>
