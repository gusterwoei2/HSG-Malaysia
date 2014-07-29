<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
require('library/adminpage.php');
require('library/opendb.php');

$page = new adminpage();
$page->displayadminheader();

$errorstr="";
if(isset($_GET['errorstr']))
	$errorstr=$_GET['errorstr'];
$currentpage = 'EVENTS';
$imagepath = '../images/events/';
$redirectloc = '../eventsimage.php';
$addnote ='Image width/height ratio: 4:3<br/>Optimum Image Size: 200pixels x 150pixels<br/>';
$page->uploadremoveimage($currentpage, $imagepath, $errorstr, $addnote, $redirectloc);

$page->displayadminfooter();
require('library/closedb.php');
}
?>


