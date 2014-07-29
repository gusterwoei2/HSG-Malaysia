<?php
session_start();

require('library/adminpage.php');
require('library/usermanagementclass.php');
$page = new adminpage();
$page->displayadminheader();

if(!isset($_SESSION['username']))
	header ('Location:index.php');
elseif($_SESSION['rank']<>'master')
	echo '<br/><br/><br/><br/><div style="color:#FF0000;text-align:center;height:800px;">Access Denied! <br/><br/>Only the Master Administrator Can Get Accessed to User Management!</div>';
else{
	
$errorstr = "";
if(isset($_GET['err']))$errorstr = $_GET['err'];
										
$usermanagement = new usermanagementclass();
$usermanagement->usermanagementform($errorstr);
$usermanagement->usermanagementlistitem();
}

$page->displayadminfooter();
?>


