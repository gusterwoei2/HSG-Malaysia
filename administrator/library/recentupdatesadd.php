<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
	$message="";
	if(isset($_POST['message']))$message = addslashes($_POST['message']);
	if($_POST["actiontype"]== "add")
			$querystr = "insert into newsupdate (message, status) values('".$message."',1)";
	if($_POST["actiontype"]== "edit"){
			$id = $_POST["id"];
			$querystr = "update newsupdate set message='".$message."', status = 1 where id='".$id."'";
		}
	$clearall = "update newsupdate set status = 0";
	
	require('opendb.php');	
	$dbconn->query($clearall);
	$dbconn->query($querystr);
	require('closedb.php');

	header('Location:../recentupdates.php');
}
?>