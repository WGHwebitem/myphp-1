<?php
include 'apifenzhuang.php';//调用封装页面
 #接收url的参数
$idv = $_GET["id"];
$firstnamev = $_GET["firstname"];
$lastnamev = $_GET["lastname"];
$emailv = $_GET["email"];
$adressv = $_GET["adress"];
$cityv = $_GET["city"];
$statev = $_GET["state"];
//echo $firstnamev.",".$lastnamev.",".$emailv.",".$adressv.",".$cityv.",".$statev;
$sql="UPDATE customers SET `firstname`='$firstnamev',`lastname`='$lastnamev',`email`='$emailv',`adress`='$adressv',`city`='$cityv',`state`='$statev' WHERE id=$idv";
selctData($sql);
  //http://localhost/myphptest/apiadd.php?firstname=小黑&lastname=韦&email=2960221@163.com&adress=水产西路富长路&city=上海市宝山区&state=YES
?>