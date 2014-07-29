<?php
session_start();
if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
$errorstr = "";

	if($_FILES['imagefile']['error']>0){
		if($_FILES['imagefile']['error']==1)
			$errorstr .= '* File exceeded maximum file size of 1Mb.<br/>';
		if($_FILES['imagefile']['error']==2)	
			$errorstr .= '* File exceeded maximum file size of 1Mb.<br/>';
		if($_FILES['imagefile']['error']==3)		
			$errorstr .= '* File only partially uploaded.<br/>';
		if($_FILES['imagefile']['error']==4)		
			$errorstr .= '* No file uploaded.<br/>';
	}

	if (($_FILES["imagefile"]["type"] == "image/gif")
	|| ($_FILES["imagefile"]["type"] == "image/jpeg")
	|| ($_FILES["imagefile"]["type"] == "image/jpg")
	|| ($_FILES["imagefile"]["type"] == "image/png")
	|| ($_FILES["imagefile"]["type"] == "image/tif")
	|| ($_FILES["imagefile"]["type"] == "image/tiff"))
	{}else
	if($_FILES['imagefile']['error']<>4)
		$errorstr .= '* Invalid file format. Only gif, jpg, jpeg, png, tif and tiff files are accepted. <br/>';

	if($errorstr==""){
		
		
		do {
			$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
			$filename = '';
			for ($i = 0; $i <8; $i++) {
		      $filename .= $characters[rand(0, strlen($characters) - 1)];
			}
			$extension = explode('.',$_FILES['imagefile']['name']);
			$filename .= '.'.end($extension);														
		
			$existingname = array();
			if ($handle = opendir($_POST['path'])) {
	    		while (false !== ($entry = readdir($handle))) {
	        		if ($entry != "." && $entry != "..") {
			            array_push($existingname,$entry);
	        		}
	    		}
			closedir($handle);
			}
			
			$again = 0;			
			foreach ($existingname as $item){
				if($item==$filename)
					$again = 1;	
			}
		}while($again == 1);
		
		$upfile = $_POST['path'].$filename;
		
		if(is_uploaded_file($_FILES['imagefile']['tmp_name'])){
			if(!move_uploaded_file($_FILES['imagefile']['tmp_name'], $upfile)){
				$errorstr = '* Could not move file to destination directory<br/>';
				exit;
			}
		}
		else{	
			$errorstr = '* '.$_FILES['imagefile']['name'].' upload failed.<br/>';
			exit;			
		}

	}
	
				  										  
	header('Location:'.$_POST['redirectloc'].'?errorstr='.$errorstr);
}
?>

