<?php
$lotteryID = $_REQUEST['lotteryID'];

function sign($lotteryID){
	$key = "123456";
	$url = "/vip/get_ticketsbyorderid";
	$iscalctotal = "true";
	$pi = "1";
	$orderid = $lotteryID;
	$signstr = $key."&iscalctotal=".$iscalctotal."&orderid=".$orderid."&pi="."$pi"."&".$url;
	$sign = md5($signstr);
	return $sign;
}
$sign = sign($lotteryID);

$posturl = "http://wanlitong.apiquery.test.5biying.com/vip/get_ticketsbyorderid?orderid=".$lotteryID."&pi=1&iscalctotal=true&sign=".$sign."";
//$html = file_get_contents($posturl);


function curl($posturl){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$posturl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}

$result = curl($posturl);
//$result = json_decode($result);
echo $result;




























?>
