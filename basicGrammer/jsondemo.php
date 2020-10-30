<?php

$postdata = '{"data":"{\"app_id\":10056,\"app_trans_id\":\"200729_10056_1595994294429\",\"app_time\":1595994294808,\"app_user\":\"5001_5059099\",\"amount\":219000,\"embed_data\":\"{\\\"merchantinfo\\\":\\\"500 Xu Quà\\\",\\\"redirecturl\\\":\\\"https:\\\\/\\\\/giangsoncuatram.jedi-games.vn\\\\/recharge\\\\/pay_success.html\\\"}\",\"item\":\"[{\\\"order_id\\\":\\\"100061\\\",\\\"cp_uid\\\":\\\"5059099\\\",\\\"cp_app_id\\\":\\\"6\\\",\\\"cp_server_id\\\":\\\"5001\\\",\\\"cp_product_id\\\":\\\"403\\\",\\\"product_price\\\":\\\"219000\\\",\\\"standard_price\\\":\\\"10.00\\\",\\\"ts_order\\\":\\\"1595994294\\\",\\\"sand_box\\\":\\\"0\\\",\\\"pay_id\\\":\\\"200729_10056_1595994294429\\\",\\\"product\\\":{\\\"standard_currency\\\":\\\"USD\\\",\\\"standard_price\\\":\\\"10.00\\\",\\\"local_price\\\":\\\"219000\\\",\\\"product_name\\\":\\\"500 Xu Quà\\\",\\\"product_description\\\":\\\"Mua để nhận 500 Xu Quà\\\",\\\"ptype\\\":\\\"6\\\"},\\\"cp_order_id\\\":\\\"8599303_5001\\\"}]\",\"zp_trans_id\":200729000099379,\"server_time\":1595994197664,\"channel\":38,\"merchant_user_id\":\"PLfHxaEt4IdSEsPgBDV-UhguhefMcXdmCQX0W_1o1hM\",\"user_fee_amount\":0,\"discount_amount\":0}","mac":"e61ca892e7e2458454cf2835563ac898e3a99728db5e5d7747af537f3e3e2153","type":1}';
$postdata = str_replace("\\\\", "\\\\\\\\\\\\\\", $postdata);
var_dump(json_decode($postdata, true));


$ret = array("ret_code" => 0);
$json = json_encode($ret);
echo $json;