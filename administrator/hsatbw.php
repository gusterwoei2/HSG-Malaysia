<?php
session_start();

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
require('library/adminpage.php');
require('library/opendb.php');

$page = new adminpage();
$page->addline = '
	<link href="css/modalboxstyles.css" rel="stylesheet" type="text/css">
	<script src="javascript/jquery.reveal.js"></script>';

$page->displayadminheader();

$errorstr ='';

if(isset($_POST['actiontype'])){
if(isset($_POST['multiplier'])){
	
	if((float)$_POST['multiplier']){
		$multiplier = $_POST['multiplier'];
		$querystr = "update hsatbw set multiplier='".$multiplier."' where id=1";
		$dbconn->query($querystr);
	}else
	$errorstr = "Invalid Multipler!";
}else
	$errorstr = "Multipler is Empty!";
}

$querystr = "select * from hsatbw";
$result = $dbconn->query($querystr);
$row = $result->fetch_assoc();
	
echo'
<texttitle>HOME SMALL ADS TITLE BACKGROUND WIDTH</texttitle>
<div id="errormsg" style="color:#FF0000">
'.$errorstr.'
</div>
<br/><br/>

<form action="hsatbw.php" method="post">
<table border="0px" style="width:800px;margin-left:-10px" cellpadding="10px">

<tr>
<td width="150px">Width Multiplier:</td>
<td width="700px"><input type="text" size="50" maxlength="20" name="multiplier" value='.$row['multiplier'].' />*</td>
</tr>

</table>
<input type="hidden" name="actiontype" value="edit">
<input type="submit" class="adminbutton adjustbutton" value="Save">
</form>
';

$page->displayadminfooter();
require('library/closedb.php');
}
?>


