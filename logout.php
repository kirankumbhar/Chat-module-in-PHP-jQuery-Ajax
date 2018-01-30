<?php
include 'connect.php';




if(session_destroy()){
	$stmt2=$db->prepare("update user set onlinestatus=0 where username=:name");
	$stmt2->bindParam("name",$_SESSION['username']);
	$stmt2->execute();
}
echo "<script>window.location.href='index.php';</script>";
?>