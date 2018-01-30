<?php
include 'connect.php';
$sts=0;
$username=$_SESSION['tousername'];
$stmt=$db->query("select * from user where username='".$username."'");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	if($stmt->rowCount()>0){
		$sts=$row['onlinestatus'];
		if($sts==0){
			echo "offline";
		}
		else{
			echo "online";
		}
	}
}
?>