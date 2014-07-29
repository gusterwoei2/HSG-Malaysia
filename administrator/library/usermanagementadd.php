<?php
require('opendb.php');	
$errorstr="";
$querystr="";
if($_POST["actiontype"] == "edit"){
	$password1 = addslashes($_POST['p1']);
	$password2 = addslashes($_POST['p2']);
	$id = $_POST["id"];
	

	if(strlen($password1)<6 || strlen($password2)<6 ){
		$errorstr = 'Password must contain at least 6 characters.';
	}elseif($password1 == $password2){
		$querystr = "update users set password='".sha1($password1)."' where id='".$id."'";
		$errorstr = 'Your password has been updated. Thank you.';
	}else $errorstr = 'Your passwords are not matching. Thank you.';
	
}else{


session_start();
if(!isset($_SESSION['username'])){
	header ('Location:index.php');  
}elseif($_SESSION['rank']<>'master'){
	//nothing is going to happen.	
}else{
	if($_POST["actiontype"]== "reset"){
		$id = $_POST["id"];
		$username = $_POST["username"];
		$querystr = "update users set password='".sha1('iloveHSG')."' where id='".$id."'";
		$errorstr = "<b>".$username."</b>'s Pasword has been reset to <b>iloveHSG</b> (Case Sentitive).<br/>Please request the user to login and change the password.";
	}

	elseif($_POST["actiontype"]== "add"){
		$validity = true;
		if(isset($_POST['username']))$username = mysql_real_escape_string($_POST['username']);
		if(isset($_POST['rank']))$rank = mysql_real_escape_string($_POST['rank']);
		if(trim($username)==""){
			$validity = false;
			$errorstr = 'Invalid username';
		}
		$querycheck = 'select username from users where username="'.$username.'"';
		$result = $dbconn->query($querycheck);
		if($result->num_rows>0){
			$validity = false;
			$errorstr = 'Username is not available. Please choose a different username.';
		}
		if($validity == true){
			$querystr = "insert into users values('','".$username."','".sha1('iloveHSG')."','".$rank."')";
			$errorstr = 'User added. The temporary password for the new user is <b>iloveHSG</b> (Case Sentitive).<br/>Please request the user to login and change the password.';
		}
}

}
}	


$dbconn->query($querystr);
require('closedb.php');

if($_POST["actiontype"]== "edit")
	header('Location:../index.php?msg='.$errorstr);		
else		
	header('Location:../usermanagement.php?err='.$errorstr);
	

?>


	
