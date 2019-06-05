<?php
include 'apifenzhuang.php';//调用封装页面
 
//1、多个条件查询其中lastname条件事模糊查询
$tj1 = " 1 = 1 ";
$tj2 = " 1 = 1 ";//两个条件的恒等
$name="";
////恒成立，如果没有写数据，那就让条件等于1=1，这个条件是查找所有的数据，如果你写入数据，按照数据查
if(!empty($_GET["lastname"])) //第一个条件的判断（用到了模糊查询）
{
    $name = $_GET['lastname'];
    $tj1 = "lastname like '%{$name}%'";
}
if(!empty($_GET["city"]))
{
    $tel = $_GET["city"];
    $tj2 = "city = '$tel'";
}
//echo $tj1,$tj2;//输出打印出来
$sql = "select * from customers WHERE {$tj1} AND {$tj2}";//将条件拼接到SQl语句
selctData($sql);



//2、根据条件查询
//$lastnamev = $_GET["lastname"];
//$cityv = $_GET["city"];
//if($lastnamev!=''&&$cityv!=''){
//	 $sql="SELECT * FROM customers WHERE lastname='$lastnamev' AND city='$cityv'";
//   selctData($sql);
//}else{
//	echo "不能为空~";
//}


//3、没有条件查询
//$sql="SELECT * FROM customers";
//selctData($sql);

?>
