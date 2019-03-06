<?php
  if(isset($_POST["submit"])){
  	$name=$_POST['name'];
  	emil=$_POST['emil'];
  	#存储到session中
  	session_start();#必须使用该方法，不然不能使用session
  	$_SESSION["name"]=name;#已存到服务器上了
  	$_SESSION["emil"]=emil;
  	header("localhost:page2.php");
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="name" placeholder="name"/>
			<input type="text" name="emil" placeholder="emil"/>
			<button  name="submit">提交</button>
		</form>
	</body>
</html>