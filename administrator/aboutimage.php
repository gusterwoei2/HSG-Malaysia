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
$currentpage = 'ABOUT US';
$imagepath = '../images/about/';
$redirectloc = '../aboutimage.php';
$addnote ='';
$page->uploadremoveimage($currentpage, $imagepath, $errorstr, $addnote, $redirectloc);

$page->displayadminfooter();
require('library/closedb.php');
}
?>


