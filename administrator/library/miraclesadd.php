<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
$title= "";
$author = "";
$date = "";
$image = "";
$summary = "";
$content = "";
$status = "";

	if(isset($_POST['title']))$title = addslashes($_POST['title']);
	if(isset($_POST['author']))$author = addslashes($_POST['author']);
	if(isset($_POST['date']))$date = addslashes($_POST['date']);
	if(isset($_POST['image']))$image = addslashes($_POST['image']);
	if(isset($_POST['summary']))$summary = addslashes($_POST['summary']);
	if(isset($_POST['area1']))$content = addslashes($_POST['area1']);
	if(isset($_POST['status']))$status = addslashes($_POST['status']);
	
	if($_POST["actiontype"]== "add")
			$querystr = "insert into miracles values('','".$title."','".$author."','".$date."','".$image."','".$summary."','".$content."','".$status."')";
			
	if($_POST["actiontype"]== "edit"){
			$id = $_POST["id"];
			$querystr = "update miracles set title='".$title."', author='".$author."', date='".$date."', imageurl='".$image."', summary='".$summary."', content='".$content."', status='".$status."' where id='".$id."'";
		}
		
	
	require('opendb.php');	
		$dbconn->query($querystr);
	require('closedb.php');
	

	header('Location:../miracles.php');
 
}
?>