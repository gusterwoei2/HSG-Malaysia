<?php

session_start();

$errormsg="";
if(isset($_GET['msg'])) $errormsg = $_GET['msg'];

if(isset($_POST['username']) && isset($_POST['password'])){

	require('library/opendb.php');
	$querystr = "select * from users where username='".$_POST['username']."' and password='".sha1($_POST['password'])."'";
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	
	if($result->num_rows>0){
		if($row['password']==sha1('iloveHSG')){
			header('Location:changepassword.php?id='.$row['id']);
		}else{
			$_SESSION['username'] = $row['username'];
			$_SESSION['rank'] = $row['rank'];
		}
	}else $errormsg = 'Invalid Username and Password!';
			
}

	
if(isset($_SESSION['username'])){
	header('Location:banner.php');
}else{

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

<div style="background:#000;width:900px;height:40px;color:#FFF;text-align:center;font-size:20px;padding-top:10px;font-weight:bold;">Administrator Login</div>
<div style="background:#FF0000;width:900px;height:3px;"></div>';


echo'
<div style="height:500px;">
<br/><br/><br/><br/>
<center>
<div style="color:#FF0000">'.$errormsg.'</div>
<br/>

<form action="index.php" method="post">

<table width="200" border="0" cellspacing="0px" cellpadding="5px">
  <tr>
    <td>Username:</td>
    <td><input type="text" size="30" maxlength="20" name="username"/></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input type="password" size="30" maxlength="20" name="password"/></td>
  </tr>

</table>
<br/>
<input type="submit" class="adminbutton adjustbutton" value="Login"/>
</form>

</div></center>
<br/><br/><br/>

</div><br/><br/>
</div>

</body>
</html>';
}



?>