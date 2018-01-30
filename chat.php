<html>
	<head>
		<?php
			include 'connect.php';
			if(!isset($_SESSION['username'])){
				echo "<script>window.location.href='index.php';</script>";
			}
		?>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="jqueryfunction.js"></script>
		<script>
			function logout(){
				window.location.href='logout.php';
			}
		</script>
	</head>
	<body>
		<div style="float:right;">
		<button id="logout" name="logout" type="submit" onclick="logout()">Log Out</button>
		</div>
		<br/>
		<p id="displayfriend" align="center"><?php echo $_SESSION['tousername']." ";?><span id="displaystatus"></span></p>
		
		<div id="chat" align="center" >
			<div id="messagesborder" >
			<div id="messages">
			</div>
			</div>
			<br/>
			<div >
			<br>
			<input id="typedMsg" type="textarea" rows=2 cols="20" name="msg"/>
			<input id="send" type="submit" value="send"/>
			<input id="uname" type="hidden" value="<?php echo $_SESSION['username']?>"/>
			</div>
		</div>
	</body>
</html>