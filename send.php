<?php
	include 'connect.php';

		if(isset($_POST['text'])){

			$text=$_POST['text'];
			$username=$_POST['username'];
			$reciever=$_SESSION['tousername'];
			$stmt=$db->prepare("insert into chat(fromusername,msg,tousername) values(?,?,?)");
			$stmt->bindValue(1,$username);
			$stmt->bindValue(2,$text);
			$stmt->bindValue(3,$reciever);
			$stmt->execute();
			//echo $_SESSION['tousername'];

			$stmt2=$db->query("Select * from chat where fromusername='".$username."' and flag=0 ");
			while($row=$stmt2->fetch(PDO::FETCH_ASSOC)){
				if($stmt2->rowCount()>0){
					echo "<div style='background-color:#EBC867' >";

					echo "<div style='float:left;'background-color:#EBC867'>";
					echo "You <br>";
					echo "</div><br>";
					echo "<div style='float:left;'background-color:#EBC867'>";
					//echo $row['fromusername']."<br>";
					echo $row ['msg']."<br>";
					echo "</div><br>";
					echo "</div><br>";
					$msg= $row['msg'];

					$stmt3=$db->prepare("update chat set flag=flag+1 where msg='".$msg."'");
					$stmt3->execute();
				}
			}
		}






?>
