<?php
/*
 *@date 2014-09-17
 *@author xiaohanfei
 *@feature 推送票详情
 */

$orderid = $_REQUEST['orderid'];
$schemeid = $_REQUEST['schemeid'];
$pagesize = $_REQUEST['pagesize'];
$total = $_REQUEST['total'];
$tickets = $_REQUEST['tickets'];
$url = $_REQUEST['url'];
$t = $_REQUEST['t'];
$userid = $_REQUEST['userid'];
$pid = $_REQUEST['pid'];

function sign($t,$pid,$userid,$orderid,$schemeid,$pagesize,$total,$tickets){
	$sign = "123456&orderid=&".$orderid."&pagesize=".$pagesize."&pid=".$pid."&schemeid=".$schemeid."&t=".$t."&tickets=".$tickets."&total=".$total."&userid=".$userid."&/lottery_ticket/detail";
	$sign = md5($sign);
	return $sign;
}

$sign = sign($t,$pid,$userid,$orderid,$schemeid,$pagesize,$total,$tickets);

function postdata($t,$pid,$userid,$orderid,$schemeid,$pagesize,$total,$tickets,$sign){
	$tickets = urlencode($tickets);
	$postdata = "orderid=&".$orderid."&pagesize=".$pagesize."&t=".$t."&schemeid=".$schemeid."&userid=".$userid."&tickets=".$tickets."&total=".$total."&pid=".$pid."&sign=".$sign;
	return $postdata;
}


$postdata = postdata($t,$pid,$userid,$orderid,$schemeid,$pagesize,$total,$tickets,$sign);

function curl($url,$postdata){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFILEDS, $postdata);
        $output = curl_exec($ch);
	$result = print_r(json_decode($output,1));
        curl_close($ch);
	return $result;
}
$result = curl($url,$postdata);
echo $postdata;
?>
