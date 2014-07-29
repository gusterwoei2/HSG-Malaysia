<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
require('library/adminpage.php');
require('library/homecontentclass.php');

$page = new adminpage();
$page->displayadminheader();
$homecontent = new homecontentclass();
$homecontent->homecontentform('add', '');
$homecontent->homecontentlistitem();
$page->displayadminfooter();
}
?>
