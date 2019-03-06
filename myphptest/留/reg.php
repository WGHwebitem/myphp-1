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
			
			//注册
			$usrename=$_POST['username'];//获取用户传过来数据
			$password=$_POST['password'];
			$email=$_POST['email'];
			
			
			$sql_sel_username_count="select  count(*) from userinfo where userName='$usrename'";
			$re=mysql_query($sql_sel_username_count);
			$count=mysql_fetch_array($re);
			$usercount=$count[0];//
			//echo $usercount;
			
			if($usercount==0)//判断数据库返回用户输入的用户名是否存在，如果不存在则新增当前数据，并且返回当前数据
			{
				//echo "No";
				
					//echo $usrename."+".$password."+".$email;
					$sql="insert into user.userinfo(id,userName,userPwd,userEmail) values(null,'$usrename','$password','$email')";
					$page_res=mysql_query($sql);//返回插入数据的id
					
					//var_dump($page_res);
					if($page_res>0)
					{
						$sql_sel="select * from userinfo where userName='$usrename' and userPwd='$password'";
						$page=mysql_query($sql_sel);
						while($arr=mysql_fetch_assoc($page))
						{
							$ajax_arr[]=$arr;	
						}
						//var_dump($ajax_arr);
						echo '{"msg":'.json_encode($ajax_arr).'}' ;
						return '{"msg":'.json_encode($ajax_arr).'}' ;
					}	
			}
			else if($usercount==1)
			{
				//echo "Yes";
				$ajax_arr="数据库用户名重名";		
				echo '{"msg":'.json_encode($ajax_arr).'}' ;
				return '{"msg":'.json_encode($ajax_arr).'}' ;	
			}
			
			
		
		}	
	}
	//$ids=$_GET['id'];//获取客户端传过来的id（新闻列表id）
	//echo $ids;
	//$sql="select * from news where id=".$ids;
	//$page_res=mysql_query($sql);
	//var_dump($page_res);
	//while($arr=mysql_fetch_assoc($page_res))
		//{
			//$ajax_arr[]=$arr;	
		//}
	//var_dump($ajax_arr);
	
	
	
?>