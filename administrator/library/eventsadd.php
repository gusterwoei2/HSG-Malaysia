<?php
session_start();
if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
$datestart= "";
$dateend = "";
$timestart = "";
$timeend = "";
$title= "";
$summary = "";
$image = "";
$venue = "";
$linktype = "";
$status = "";
$link = "";

	if(isset($_POST['datestart']))$datestart = addslashes($_POST['datestart']);
	if(isset($_POST['dateend']))$dateend = addslashes($_POST['dateend']);
	if(isset($_POST['timestart']))$timestart = addslashes($_POST['timestart']);
	if(isset($_POST['timeend']))$timeend = addslashes($_POST['timeend']);
	if(isset($_POST['title']))$title = addslashes($_POST['title']);
	if(isset($_POST['summary']))$summary = addslashes($_POST['summary']);
	if(isset($_POST['image']))$image = addslashes($_POST['image']);
	if(isset($_POST['venue']))$venue = addslashes($_POST['venue']);
	if(isset($_POST['linktype']))$linktype = addslashes($_POST['linktype']);
	if(isset($_POST['status']))$status = addslashes($_POST['status']);
	if(isset($_POST['area1']))$link = addslashes($_POST['area1']);
	
	if($_POST["actiontype"]== "add")
			$querystr = "insert into events values('','".$datestart."','".$dateend."','".$timestart."','".$timeend."','".$title."','".$summary."','".$image."','".$venue."','".$linktype."','".$link."','".$status."')";
			
	if($_POST["actiontype"]== "edit"){
			$id = $_POST["id"];
			$querystr = "update events set datestart='".$datestart."', dateend='".$dateend."', timestart='".$timestart."', timeend='".$timeend."', title='".$title."', summary='".$summary."', imageurl='".$image."', venue='".$venue."', link='".$link."', status='".$status."', linktype='".$linktype."' where id='".$id."'";
		}
		
	
	require('opendb.php');	
		$dbconn->query($querystr);
	require('closedb.php');
	

	header('Location:../events.php');
}

?>