<?php
session_start();
if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
if($_POST['postsource']=="database"){
	
	require('opendb.php');
	$proceed = true;
	
	if($_POST['posttable'] == "users"){		
		$checkmaster = "select id from users where rank='master'";
		$result = $dbconn->query($checkmaster);
		$row = $result->fetch_assoc();
		if($result->num_rows == 1 && $row["id"]==$_POST['postid']){
			$proceed = false;
			echo "onlyonemaster";
		}
	}

	if($proceed == true){
		$querystr = "delete from ".$_POST['posttable']." where id = '".$_POST['postid']."'";
		if($dbconn->query($querystr))
			echo 1;
		else
			echo 0;
		require('closedb.php');
	}
}



if($_POST['postsource']=="file"){
	if(unlink($_POST['posttable']))
		echo 1;
	else
		echo 0;
}


}
?>