<?php

	$id=$_GET['id'];
	$errormsg="";

	require('library/opendb.php');
	$querystr = "select * from users where id='".$id."'";
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	if($row['password'] == sha1('iloveHSG')){
		
	echo'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/adminlayout.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="bgmain">
<div id="bgpagecontainer">

<div id="header">
<br/>
<center><a href="../index.php" target="_blank"><img src="images/hsglogo.png" width="110px" /></a></center>
</div>

<div style="background:#000;width:900px;height:40px;color:#FFF;text-align:center;font-size:20px;padding-top:10px;font-weight:bold;">Please Change Your Password</div>
<div style="background:#FF0000;width:900px;height:3px;"></div>';


echo'
<div style="height:500px;">
<br/><br/><br/><br/>
<center>
<div style="color:#FF0000">'.$errormsg.'</div>
<br/>

<form action="library/usermanagementadd.php" method="post">

<table width="400" border="0" cellspacing="0px" cellpadding="5px">
  <tr>
    <td>Username:</td>
    <td><input type="text" size="30" maxlength="20" value="'.$row['username'].'" disabled/></td>
  </tr>
  
  <tr>
    <td>Password:</td>
    <td><input type="password" size="30" maxlength="20" name="p1"/></td>
  </tr>
  <tr>
    <td>Reconfirm Password:</td>
    <td><input type="password" size="30" maxlength="20" name="p2"/></td>
  </tr>

</table>
<br/>
<input type="hidden" name="actiontype" value="edit">
<input type="hidden" name="id" value="'.$id.'">
<input type="submit" class="adminbutton adjustbutton" value="Save"/>
</form>

</div></center>
<br/><br/><br/>

</div><br/><br/>
</div>

</body>
</html>';
}	
		

?>