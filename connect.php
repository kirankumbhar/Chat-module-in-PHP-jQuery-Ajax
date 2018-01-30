<?php
try{
	$db=new PDO("mysql:host=localhost; dbname=chat;","root","");
}
catch(PDOException $e){
	echo $e->getMessage();
}
session_start();
?>