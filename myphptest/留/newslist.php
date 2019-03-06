<?php
	$host="localhost";
	$user="root";
	$pwd="";
	$dbname="user";
	$link=new mysqli("localhost","root","","people");
	#判断数据库是否连接成功,打印错误信息
		if($link->connect_errno){
			#只要不为0，就表示失败
			die($link->connect_error);
		}
//	$link=mysql_connect($host,$user,$pwd,$dbname)or die("Could not connect:".mysql_error());
	mysql_select_db($dbname,$link) or die('Can\'t test:'.mysql_error());
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER_SET_CLIENT=utf8");
	mysql_query("SET CHARACTER_SET_RESULTS=utf8");
	//定义查询语句
	$sql_page="select * from customers order by id desc LIMIT 0,5";
	$page_res=mysql_query($sql_page);
	echo $page_res;
	while($arr=mysql_fetch_assoc($page_res))
	{
		$ajax_arr[]=$arr;	
	}
	//var_dump($ajax_arr);
	echo '{"msg":'.json_encode($ajax_arr).'}' ;
	return '{"msg":'.json_encode($ajax_arr).'}' ;
?>