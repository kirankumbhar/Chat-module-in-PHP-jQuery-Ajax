<html>
	<head>
		<?php
		include 'connect.php';
		?>
		<script>
			function login(){
				window.location.href='login.php';
			}
		</script>
	</head>
	<body>
		<button id="login" type="submit" onclick="login()">LOG IN</button>
		<button id="register" type="submit" onclick="register()">REGISTER</button>
		
	</body>
</html>