<?php
session_start();
if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
$title= "";
$content = "";
$status = "";

	if(isset($_POST['title']))$title = addslashes($_POST['title']);
	if(isset($_POST['area1']))$content = addslashes($_POST['area1']);
	if(isset($_POST['status']))$status = addslashes($_POST['status']);
	if(isset($_POST['id']))$id = addslashes($_POST['id']);
	
	if($_POST["actiontype"]== "add")
			$querystr = "insert into homecontent values('','".$title."','".$content."','".$status."')";
	if($_POST["actiontype"]== "edit"){
			$id = $_POST["id"];
			$querystr = "update homecontent set title='".$title."', status='".$status."', content='".$content."' where id='".$id."'";
		}
		
	
	require('opendb.php');	
	if($status==1){
		$clearall = "update homecontent set status=0";
		$dbconn->query($clearall);
	}
	
	$dbconn->query($querystr);
	require('closedb.php');
	

	header('Location:../homecontent.php');
}

?>