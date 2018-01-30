<?php
	include 'connect.php';
	$reciever=$_SESSION['tousername'];
	$stmt2=$db->query("Select * from chat where fromusername='".$reciever."' and recieverflag=0 ");
			while($row=$stmt2->fetch(PDO::FETCH_ASSOC)){
				if($stmt2->rowCount()>0){
					echo "<div style='background-color:#65a186'>";
					echo "<div style='float:right;'background-color:#65a186'>";
					echo $row['fromusername']."<br>";
					echo "</div><br>";
					echo "<div style='float:right;'background-color:#65a186'>";
					//echo $row['fromusername']."<br>";
					echo $row ['msg']."<br>";
					echo "</div><br>";
					echo "</div><br>";
					$msg= $row['msg'];

					$stmt3=$db->prepare("update chat set recieverflag=recieverflag+1 where msg='".$msg."'");
					$stmt3->execute();
				}
			}
?>
