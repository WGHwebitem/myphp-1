<?php
	$host="localhost";
	$user="root";
	$pwd="";
	$dbname="user";
	$link=mysql_connect($host,$user,$pwd)or die("Could not connect:".mysql_error());
	mysql_select_db($dbname,$link) or die('Can\'t test:'.mysql_error());
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER_SET_CLIENT=utf8");
	mysql_query("SET CHARACTER_SET_RESULTS=utf8");
	//定义查询语句
if($_POST)
{	
	if($_POST['username'])
	{
		$name=$_POST['username']	;
		$pwd=$_POST['password'];
		//echo $name."--".$pwd;
		$sql="select * from userinfo where userName='".$name."' and userPwd='".$pwd."'";
		//echo $sql;
		$page_res=mysql_query($sql);
		//echo $page_res;
		
		while($arr=mysql_fetch_assoc($page_res))
		{
			$ajax_arr[]=$arr;	
		}
		//var_dump($ajax_arr);
		echo '{"msg":'.json_encode($ajax_arr).'}' ;
		return '{"msg":'.json_encode($ajax_arr).'}' ;
	}
}
	
	
	
?>