<?php
	include 'connect.php';
	
	if(!empty($_POST['reciever'])){
		$_SESSION['tousername']=$_POST['reciever'];
		
		echo "now you can chat";
	}
	else{
		echo "Enter friends username";
	}
?>