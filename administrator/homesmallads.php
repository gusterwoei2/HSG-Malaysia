<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
require('library/adminpage.php');
require('library/homesmalladsclass.php');

$page = new adminpage();
$page->addline = '
	<link href="css/modalboxstyles.css" rel="stylesheet" type="text/css">
	<script src="javascript/jquery.reveal.js"></script>';
$page->displayadminheader();

$homesmallads = new homesmalladsclass();
$homesmallads->homesmalladsform('add', '');
$homesmallads->homesmalladslistitem();

$page->displayadminfooter();
}
?>


