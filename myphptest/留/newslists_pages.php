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
	
	$perNumber=$_GET['page_num'];//获取每页显示的条数
	$page=$_GET['page'];//获取当前的页数
	$count=mysql_query("select count(*) from news");//定义查询语句查询数据库新闻的总条数
	$rs=mysql_fetch_array($count);
	$totalNumber=$rs[0];//计算出新闻的总条数
	$totalPage=ceil($totalNumber/$perNumber);//计算总页数
	if($page>$totalPage)
	{
		$ajax_arr="";	
	}
	else
	{
		if(!isset($page))
		{
			$page=1;	
		}
		$startCont=($page-1)*$perNumber;//分页开始的条数
		$sql="select * from news limit ".$startCont.",".$perNumber."";
		$sql_page=mysql_query($sql);
		while($arr=mysql_fetch_assoc($sql_page))
		{
			$ajax_arr[]=$arr;	
		}
	}
	//var_dump($ajax_arr);
	
	echo '{"msg":'.json_encode($ajax_arr).'}' ;
	return '{"msg":'.json_encode($ajax_arr).'}' ;
?>