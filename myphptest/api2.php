<?php
	#向数据插入数据的封装方法
	function insertData($sql){
		#连接数据库 字段1(表示主机名)字段2(表示主机登陆用户名)字段3(表示主机登陆用户)字段3(表示数据库表名)
		$mysqli=new mysqli("localhost","root","","people");
		#判断数据库是否连接成功,打印错误信息
		if($mysqli->connect_errno){
			#只要不为0，就表示失败
			die($mysqli->connect_error);
		}
		#设定编码格式
		$mysqli->query("set names utf8");
		$result=$mysqli->query($sql);
		#判断是否插入成功
		if($result){
			echo "插入成功！";
		}else{
			echo "插入失败！";
		}
		$mysqli->close();
	}
	#插入数据
        $sql="INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `adress`, `city`, `state`) VALUES (NULL, '小xc', 'wei', '123@qq.com', '上海', '宝山', '成功')";
        //insertData($sql);
	#更新数据
		function updDatav($sql){
		$mysqli=new mysqli("localhost","root","","people");
		if($mysqli->connect_errno){
			die($mysqli->connect_error);
		}
		$mysqli->query("set names utf8");
		$result=$mysqli->query($sql);
		if($result){
			echo "更新成功！";
		}else{
			echo "更新失败！";
		}
		$mysqli->close();
	}
	$sql="UPDATE customers SET `firstname`='henry',`lastname`='吴小西安' WHERE id=1";
//  updDatav($sql);
	#删除数据
		function deleteDatav($sql){
		$mysqli=new mysqli("localhost","root","","people");
		if($mysqli->connect_errno){
			die($mysqli->connect_error);
		}
		$mysqli->query("set names utf8");
		$result=$mysqli->query($sql);
		if($result){
			echo "删除成功！";
		}else{
			echo "删除失败！";
		}
		$mysqli->close();
	}
	$sql="DELETE FROM customers WHERE id=5";
    deleteDatav($sql);
    
    
?>