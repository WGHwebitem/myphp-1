<?php
include 'apifenzhuang.php';//调用封装页面
 #接收url的参数（更据唯一键去删除某条数据） customers表名
$idv = $_GET["id"];
//echo $firstnamev.",".$lastnamev.",".$emailv.",".$adressv.",".$cityv.",".$statev;
$sql="DELETE FROM customers WHERE id=$idv";
selctData($sql);
  //http://localhost/myphptest/apiadd.php?firstname=小黑&lastname=韦&email=2960221@163.com&adress=水产西路富长路&city=上海市宝山区&state=YES
?>