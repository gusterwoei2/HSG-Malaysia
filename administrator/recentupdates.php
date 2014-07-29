<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
require('library/adminpage.php');
require('library/recentupdatesclass.php');

$page = new adminpage();
$page->displayadminheader();
$recentupdates = new recentupdatesclass();
$recentupdates->recentupdatesform('add','');
$recentupdates->recentupdateslistitem();
$page->displayadminfooter();
}
?>


