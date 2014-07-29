<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
require('library/adminpage.php');
require('library/recentupdatesclass.php');
$page = new adminpage();
$page->displayadminheader();

if(isset($_GET["id"]))
   $id = $_GET["id"];

$recentupdates = new recentupdatesclass();
$recentupdates->recentupdatesform('edit',$id);

$page->displayadminfooter();
}
?>






