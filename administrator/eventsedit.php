<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
require('library/adminpage.php');
require('library/eventsclass.php');

$page = new adminpage();
$page->addline = '	<link href="css/modalboxstyles.css" rel="stylesheet" type="text/css">
					<script src="javascript/jquery.reveal.js"></script>';
$page->displayadminheader();

if(isset($_GET['id']))
	$id=$_GET['id'];
	
$events = new eventsclass();
$events->eventsform('edit', $id);
$page->displayadminfooter();
}
?>
