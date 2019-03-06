<?php
  #http://localhost/myphptest/test.php
  $msg='';//存储内容
  $msgClass='';//存储对应的样式
   if(filter_has_var(INPUT_POST,'submit')){
   	#echo "success";   
   #获取表单内容(定义一个$_name变量来存储)
   $_name=$_POST["name"];
   $_emil=$_POST["emil"];
   $_massage=$_POST["massage"];
   #验证内容是否为空
   if(!empty($_name) && !empty($_emil) && !empty($_massage)){
   	//判断emile是否是有效的
   	if(!filter_var($_emil,FILTER_VALIDATE_EMAIL)){
   		$msg='请输入合法的emil~';
   	  $msgClass='alert-danger';
   	}else{
   		#pass  
   		$toEmail="2963572330@qq.com";
   		$subject="你好！form".$_name;
   		$body='<h2>来自于 content Request</h2>
						<h4>姓名：</h4>
						<p>'.$_name.'</p>
						<h4>邮箱：</h4>
						<p>'.$_emil.'</p>
						<h4>内容：</h4>
						<p>'.$_massage.'</p>';
						#emil header
						$headers="MIME-Version:1.0"."\r\n";
						$headers .="Content-Type:text/html;charset=UTF-8"."\r\n";
						$headers .="From:".$_name."<".$_emil.">"."\r\n";
   	       if(mail($toEmail,$subject,$body,$headers)){
   	       	  $msg="发送成功~";
   	       	  $msgClass="alert-success";   	      
   	       }else{
   	       	  $msg="发送失败~";
   	       	  $msgClass="alert-danger";  
   	       }
     	}
   }else{
   	#failed
   	$msg='内容不能为空~';
   	$msgClass='alert-danger';
   }
 }
?>
<!DOCTYPE  html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>邮件发送</title>
		<style>
			
			.center1 div{margin-top: 10px;}
			.center1 div input{height: 30px;line-height: 30px;}
		</style>
	</head>
	<body>
		<nav class="navbar">
			<div id="">标题:邮件发送</div>
		</nav>
		<div class="center1">
			<?php if($msg !=''): ?>
			<div class="alert <?php echo $msgClass; ?>">
				<?php echo $msg; ?>
			</div>
			<?php endif; ?>
				<!--action="<?php echo $_SERVER['PHP_SELF']; ?>表示请求当前页的php-->
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="name1">
				<label >姓名</label>
				<input name="name" type="text" placeholder="请输入您的名字~" value="<?php echo isset($_POST['name']) ? $_name :'';?>"/>
			</div>
			<div class="emil2">
				<label >邮箱</label>
				<input name="emil" type="text" value="<?php echo isset($_POST['emil']) ? $_emil :'';?>"/>
			</div>
			<div class="nr3">
				<label >消息</label>
				<textarea  name="massage"><?php echo isset($_POST['massage']) ? $_massage :'';?>
				</textarea>
				
			</div>
			<div class="upmassg">
				<button type="submit" name="submit">提交</button>
			</div>
			</form>
		</div>
		
		
	</body>
</html>