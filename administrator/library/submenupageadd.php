<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
	if(isset($_POST['title']))$title = addslashes($_POST['title']);
	if(isset($_POST['position']))$position = addslashes($_POST['position']);
	if(isset($_POST['area1']))$lcontent = addslashes($_POST['area1']);
	if(isset($_POST['area2']))$rcontent = addslashes($_POST['area2']);
	if(isset($_POST['page']))$page = addslashes($_POST['page']);
	
	if($_POST["actiontype"]== "add")
			$querystr = "insert into submenupages values('','".$page."','".$title."','".$lcontent."','".$rcontent."','".$position."')";
	if($_POST["actiontype"]== "edit"){
			$id = $_POST["id"];
			$querystr = "update submenupages set title='".$title."', leftcontent='".$lcontent."', rightcontent='".$rcontent."', position='".$position."' where id='".$id."'";
		}
		
	require('opendb.php');	
	$dbconn->query($querystr);
	require('closedb.php');
	
	header('Location:../'.$_POST["redirectloc"]);

}

?>