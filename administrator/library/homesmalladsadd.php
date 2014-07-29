<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
	if(isset($_POST['title']))$title = addslashes($_POST['title']);
	if(isset($_POST['introline']))$introline = addslashes($_POST['introline']);
	if(isset($_POST['link']))$link = addslashes($_POST['link']);
	if(isset($_POST['target']))$target = addslashes($_POST['target']);
	if(isset($_POST['position']))$position = addslashes($_POST['position']);
	if(isset($_POST['image']))$image = addslashes($_POST['image']);

	if($_POST["actiontype"]== "add")
			$querystr = "insert into homesmallads values('','".$title."','".$image."','".$link."','".$target."','".$introline."','".$position."')";
	if($_POST["actiontype"]== "edit"){
			$id = $_POST["id"];
			$querystr = "update homesmallads set title='".$title."', imageurl='".$image."', link='".$link."', target='".$target."', introline='".$introline."', position='".$position."' where id='".$id."'";
		}
		
	require('opendb.php');	
	$result = $dbconn->query($querystr);
	require('closedb.php');

	header('Location:../homesmallads.php');

}
?>