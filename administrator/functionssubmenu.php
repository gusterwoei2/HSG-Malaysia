<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
require('library/adminpage.php');
require('library/submenupageclass.php');

$page = new adminpage();
$submenu = new submenupageclass();
$page->addline = '<link href="../css/layout.css" rel="stylesheet" type="text/css">';
$page->displayadminheader();
$submenu->submenupageform('functions', 'functions', 'functionssubmenu.php', 'add','');
$submenu->submenupagelistitem('functions', 'functions', 'functionssubmenuedit');
$page->displayadminfooter();
}
?>
