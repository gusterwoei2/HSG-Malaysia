<?php
session_start();
if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
	if(isset($_POST['title']))$title = addslashes($_POST['title']);
	if(isset($_POST['image']))$imageurl = addslashes($_POST['image']);
	if(isset($_POST['link']))$link = addslashes($_POST['link']);
	if(isset($_POST['target']))$target = addslashes($_POST['target']);
	if(isset($_POST['displaypage']))$displaypage = addslashes($_POST['displaypage']);
	if(isset($_POST['position']))$position = addslashes($_POST['position']);

	if($_POST["actiontype"]== "add")
			$querystr = "insert into banner values('','".$title."','".$imageurl."','".$link."','".$target."','".$displaypage."','".$position."')";
	if($_POST["actiontype"]== "edit"){
			$id = $_POST["id"];
			$querystr = "update banner set title='".$title."', imageurl='".$imageurl."', link='".$link."', target='".$target."', displaypage='".$displaypage."', position='".$position."' where id='".$id."'";
		}
	require('opendb.php');	
	$result = $dbconn->query($querystr);
	require('closedb.php');

	header('Location:../banner.php');
}
?>