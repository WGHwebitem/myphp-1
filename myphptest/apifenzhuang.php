<?php
	header("content-type:text/html;charset=UTF-8");
	#告诉浏览器不要缓存
	header('Cache-Control:no-cache');
	#向数据插入数据的封装方法 符号->表示插入式解引操作符(调用)
	function selctData($sql){		
		#连接数据库 new mysqli(服务器地址,服务器用户名,服务器密码,数据库名称)
		$mysqli=new mysqli("localhost","root","","people");
		#判断数据库是否连接成功,打印错误信息
		if($mysqli->connect_errno){
			#只要不为0，就表示失败
			die($mysqli->connect_error);
		}
		#设定字符编码
		$mysqli->query("set names utf8");
		$result=$mysqli->query($sql);
		#打印出数据给客户端
		//var_dump($result);
		#判断是否查询到数据
		if($result->num_rows){
			#查询数据的第一种方法fetch_row()
			//$row=$result->fetch_row();//fetch_row()php数据库中获取数据的方法
			//print_r($row);
//			while($row=$result->fetch_row()){
//				print_r($row);
//			}
			#查询数据的第二种方法fetch_array() 参数MYSQL_ASSOC表示是下表数组查询还是关联数组查询
//			while($row=$result->fetch_array(MYSQLI_ASSOC)){
//				print_r($row);
//				echo "<hr>";
//			}
			#查询数据的第三种方法 fetch_all();
			$Table="'Table'";
			$row=$result->fetch_all(MYSQLI_ASSOC);
				//echo json_encode($row);//json_encode返回json格式
				//JSON_UNESCAPED_UNICODE 中文不转为unicode ，对应的数字 
				$rowjson=json_encode($row,JSON_UNESCAPED_UNICODE);
			     echo  $rowjson;
			    
		}
		$mysqli->close();//关闭连接数据库
	}
//      $sql="SELECT * FROM customers";
//      selctData($sql);
		
    
?>