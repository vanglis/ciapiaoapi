<?php
/*
 *@date 2014-09-17
 *@author xiaohanfei
 *@feature 获取schemeid
 */



$lotteryID = $_REQUEST['lotteryID'];


//连接数据库查询schemeid
function conmysql($lotteryID){
	$con = mysql_connect("25.17.1.59","db_wlt_caipiao_1","db_wlt_caipiao_1123");
	if(!$con){
	die('Could not connet:'.mysql_error());
	}
	mysql_select_db("db_wlt_caipiao_1",$con);
	$sql = "select * from t_lottery_buy where lottery_order_id='".$lotteryID."'";
	$result = mysql_query($sql);
	mysql_close($con);
	return $result;
}
 
echo conmysql($lotteryID);



?>
