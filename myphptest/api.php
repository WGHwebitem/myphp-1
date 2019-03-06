<?php
   #连接数据库 字段1(表示主机名)字段2(表示主机登陆用户名)字段3(表示主机登陆用户)字段3(表示数据库表名)
   $mysqli=new mysqli("localhost","root","","people");
#判断数据库是否连接成功,打印错误信息
if($mysqli->connect_errno){
	#只要不为0，就表示失败
	die($mysqli->connect_error);
}
#设定编码格式
$mysqli->query("set names utf8");
$result=$mysqli->query("INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `adress`, `city`, `state`) VALUES (NULL, '小x', 'wei', '123@qq.com', '上海', '宝山', '成功');");
#判断是否插入成功
if($result){
	echo "插入成功！";
}else{
	echo "插入失败！";
}
#关闭数据库
$mysqli->close();
?>