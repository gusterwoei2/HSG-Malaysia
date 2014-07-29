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
$currentpage = 'BANNER';
$imagepath = '../banner/data1/images/';
$redirectloc = '../bannerimage.php';
$addnote ='Image width/height ratio: 2:1<br/>Optimum Image Size: 700pixels x 350pixels<br/>';
$page->uploadremoveimage($currentpage, $imagepath, $errorstr, $addnote, $redirectloc);

$page->displayadminfooter();
require('library/closedb.php');
}
?>


