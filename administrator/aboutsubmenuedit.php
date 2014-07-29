<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
require('library/adminpage.php');
require('library/submenupageclass.php');

if(isset($_GET['id']))
	$id=$_GET['id'];
	
$page = new adminpage();
echo '<div id="fifi"></div>';
$submenu = new submenupageclass();
$page->addline = '<script src="javascript/jsfunctions.js"></script><link href="../css/layout.css" rel="stylesheet" type="text/css">';
$page->displayadminheader();

$submenu->submenupageform('about', 'about us', 'aboutsubmenu.php', 'edit', $id);
$page->displayadminfooter();
}
?>
