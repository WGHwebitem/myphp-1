<?php
include 'apifenzhuang.php';//调用封装页面
 #接收url的参数
//$idv = $_GET["id"];
$firstnamev = $_GET["firstname"];
$lastnamev = $_GET["lastname"];
$emailv = $_GET["email"];
$adressv = $_GET["adress"];
$cityv = $_GET["city"];
$statev = $_GET["state"];
#判断是否拿到属性名
if($firstnamev!=''&&$lastnamev!=''&&$emailv!=''&&$adressv!=''&&$cityv!=''){
	$sql="INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `adress`, `city`, `state`) VALUES (NULL, '$firstnamev', '$lastnamev', '$emailv', '$adressv', '$cityv', '$statev')";
selctData($sql);
}else{
	echo "不能为空~";
}
//echo $firstnamev.",".$lastnamev.",".$emailv.",".$adressv.",".$cityv.",".$statev;
//$sql="INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `adress`, `city`, `state`) VALUES (NULL, '$firstnamev', '$lastnamev', '$emailv', '$adressv', '$cityv', '$statev')";
//selctData($sql);
  //http://localhost/myphptest/apiadd.php?firstname=小黑&lastname=韦&email=2960221@163.com&adress=水产西路富长路&city=上海市宝山区&state=YES
?>