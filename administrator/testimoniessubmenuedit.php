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
$submenu = new submenupageclass();
echo '<div id="fifi"></div>';
$page->addline = '<link href="../css/layout.css" rel="stylesheet" type="text/css">';
$page->displayadminheader();
$submenu->submenupageform('testimonies', 'testimonies', 'testimoniessubmenu.php', 'edit', $id);
$page->displayadminfooter();
}
?>
