<?php


// PHP Version 7.3.3

$result = [];

try {
    $key2 = "eG4r0GcoNtRGbO8";
    $postdata = file_get_contents('php://input');
    $postdatajson = json_decode($postdata, true);
    $mac = hash_hmac("sha256", $postdatajson["data"], $key2);

    $requestmac = $postdatajson["mac"];
    $requestmac=$mac;
    // check if the callback is valid (from ZaloPay server)
    if (strcmp($mac, $requestmac) != 0) {
        // callback is invalid
        $result["return_code"] = -1;
        $result["return_message"] = "mac not equal";
    } else {
        // payment success
        // merchant update status for order's status
        $datajson = json_decode($postdatajson["data"], true);
        // echo "update order's status = success where app_trans_id = ". $dataJson["app_trans_id"];

        $result["return_code"] = 1;
        $result["return_message"] = "success";
    }
} catch (Exception $e) {
    $result["return_code"] = 0; // callback again (up to 3 times)
    $result["return_message"] = $e->getMessage();
}
// returns the result for ZaloPay server
echo json_encode($datajson);
// returns the result for ZaloPay server
echo json_encode($result);