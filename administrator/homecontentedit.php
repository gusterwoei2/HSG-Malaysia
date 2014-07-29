<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
require('library/adminpage.php');
require('library/homecontentclass.php');

$page = new adminpage();
$page->displayadminheader();

if(isset($_GET["id"]))
	$id = $_GET["id"];

$homecontent = new homecontentclass();
$homecontent->homecontentform('edit',$id);
$page->displayadminfooter();
}
	
?>
