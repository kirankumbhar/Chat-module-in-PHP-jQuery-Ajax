<html>
	<head>
	<?php
		include 'connect.php';
		if(isset($_session['username'])){
			echo"<script>window.location.href='chat.php';</script>";
		}
	?>
	<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="jqueryfunction.js"></script>
	</head>
	<body>
		<div class="d1" align="center">
		<form action="login.php" method="post">
		<div id="head" align="center"><h1>LOGIN</h1></div>
		username:<input type="text" name="username"><br><br>
		password:<input type="password" name="password"><br><br>
		Friend's username:<input id="recieverusername" type="text" name="recieverusername"><br><br>
		
		<button id="join" type="submit">Submit</button>
		</div>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['username'])&&isset($_POST['password'])){
		$stmt=$db->prepare("select * from user where username=:uname and password=:pass");
		$stmt->bindParam("uname",$_POST['username']);
		$stmt->bindParam("pass",$_POST['password']);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$_SESSION['username']=$_POST['username'];
			$_SESSION['tousername']=$_POST['recieverusername'];
			
			$stmt2=$db->prepare("update user set onlinestatus=1 where username=:name");
			$stmt2->bindParam("name",$_POST['username']);
			$stmt2->execute();
			
			
			echo"<script>window.location.href='chat.php';</script>";
		}
		else{
			echo "wrong username or password";
		}
		
	}
?>