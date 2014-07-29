<?php

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
class adminpage{

public $addline;

public function displayadminheader(){

echo'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/menustyles.css" rel="stylesheet" type="text/css">
<link href="css/adminlayout.css" rel="stylesheet" type="text/css">
<script type ="text/javascript" src="javascript/jquery.js"></script>
<script type ="text/javascript" src="javascript/jsfunctions.js"></script>'
.$this->addline.
'</head>

<body>
<div id="bgmain">
<div id="bgpagecontainer">

<div id="header">
<br/>
<center><a href="../index.php" target="_blank"><img src="images/hsglogo.png" width="110px" /></a></center>
</div>
<div id="cssmenu">

<ul>
  
	<li class="has-sub"><a href="#"><span>Banner</span></a>
		<ul>
			<li class="has-sub"><a href="bannerimage.php"><span>Upload / Remove Banner Image</span></a></li>
            <li class="has-sub"><a href="banner.php"><span>Edit Banner</span></a></li>
		</ul>
	</li>

	<li class="has-sub"><a href="#"><span>Home</span></a>
		<ul>
            <li class="has-sub"><a href="homeimage.php"><span>Upload / Remove Home Image</span></a></li>
            <li class="has-sub"><a href="recentupdates.php"><span>Edit Recent Updates</span></a></li>
			<li class="has-sub"><a href="homecontent.php"><span>Edit Home Content</span></a></li>
            <li class="has-sub"><a href="homesmallads.php"><span>Edit Home Small Ads</span></a></li>
            <li class="has-sub"><a href="hsatbw.php"><span>Edit HSA Title Background Width</span></a></li>
		</ul>
	</li>    

	<li class="has-sub"><a href="#"><span>About Us</span></a>
		<ul>
            <li class="has-sub"><a href="aboutimage.php"><span>Upload / Remove About Us Image</span></a></li>
            <li class="has-sub"><a href="aboutsubmenu.php"><span>Edit About Us Submenu And Content</span></a></li>
		</ul>
	</li>    

	<li class="has-sub"><a href="#"><span>Functions</span></a>
		<ul>
            <li class="has-sub"><a href="functionsimage.php"><span>Upload / Remove Functions Image</span></a></li>		
            <li class="has-sub"><a href="functionssubmenu.php"><span>Edit Functions Submenu And Content</span></a></li>
            <li class="has-sub"><a href="eventsimage.php"><span>Upload / Remove Events Image</span></a></li>					
            <li class="has-sub"><a href="events.php"><span>Edit Events</span></a></li>
		</ul>
	</li>    

	<li class="has-sub"><a href="#"><span>Missions</span></a>
		<ul>
            <li class="has-sub"><a href="missionsimage.php"><span>Upload / Remove Missions Image</span></a></li>		
			<li class="has-sub"><a href="missionssubmenu.php"><span>Edit Missions Submenu And Content</span></a></li>
		</ul>
	</li>    

	<li class="has-sub"><a href="#"><span>Testimonies</span></a>
		<ul>
            <li class="has-sub"><a href="testimoniesimage.php"><span>Upload / Remove Testimonies Image</span></a></li>		
			<li class="has-sub"><a href="testimoniessubmenu.php"><span>Edit Testimonies Submenu And Content</span></a></li>
            <li class="has-sub"><a href="miraclesimage.php"><span>Upload / Remove Miracles Image</span></a></li>				
            <li class="has-sub"><a href="miracles.php"><span>Edit Miracles</span></a></li>
		</ul>
	</li>    
    
    <li class="has-sub"><a href="logout.php"><span>Logout</span></a>';

	if($_SESSION['rank'] == 'master')
		echo '<ul><li class="has-sub" style="width:123px;text-align:center;"><a href="usermanagement.php"><span>User Management</span></a></li></ul></li>';		

echo '
</ul>
</div>
<div id="maincontent">';
}


public function insertmodalboximage($path){

$images = array();
if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            array_push($images,$entry);
        }
    }
    closedir($handle);
}


$row = ceil(count($images)/4);

	echo'
	
	<!--Modal Box Content and Setting-->
	
	<div id="modal" class="modal">
		<div id="heading" class="heading">Please Select The Image</div>
	
		<div id="content" class="content"><div>';

for	($i=0; $i<$row; $i++){
	echo '<div style="width:800px;height:90px;padding:0px 25px 0px 25px;clear:both">';

	for ($j=0;$j<4; $j++){
		$imagename = array_shift($images);
		echo'
			<div style="width:200px;height:100px;float:left" >
			<a href="#" class="bannerimage" onclick="filltext(\''.$imagename.'\')" ><img src="'.$path.$imagename.'" style="height:75px;"/><br/>'.$imagename.'</a>
			</div>';
		if(count($images)==0)
			break;					
		}
	echo '</div>';
}
	
	echo'</div></div></div>

	<!--Modal Box Content and Setting-->
	';
}


public function uploadremoveimage($page, $path, $errorstr, $addnote, $redirectloc){

//Upload Image
echo'
<texttitle>UPLOAD NEW '.$page.' IMAGE</texttitle>
<div id="errormsg" style="color:#FF0000">'.$errorstr.'
</div>
<br/><br/>
<form enctype="multipart/form-data" action="library/addimage.php" method="post">
<div>'.$page.' Image File: <input type="file" name="imagefile" size="50"/><br/><br/>
'.$addnote.'
Maximum File Size: 1Mb<br/>
Allowable Format: gif, jpg, jpeg, png, tif, tiff only<br/>
<input type="hidden" name="redirectloc" value="'.$redirectloc.'"/>
<input type="hidden" name="path" value="../'.$path.'"/>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
<br/><br/><input type="submit" value="Upload" class="adminbutton adjustbutton"/>
</form>
<br/><br/><br/><br/>';


//Display and Delete Image
echo'
<texttitle>DELETE '.$page.' IMAGE (Click on the Image to Remove It From the System)</texttitle><br/><br/><br/>';

$images = array();
if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            array_push($images,$entry);
        }
    }
    closedir($handle);
}


$row = ceil(count($images)/4);

	echo'
	
	<div>';

	for	($i=0; $i<$row; $i++){
		echo '<div style="width:800px;height:90px;padding:0px 25px 0px 25px;clear:both">';

	for ($j=0;$j<4; $j++){
		$imagename = array_shift($images);
		echo'
			<div style="width:200px;height:120px;float:left;text-align:center;" >
			<a href="#" class="bannerimage" onclick="deletedata(\'file\',\'../'.$path.''.$imagename.'\',\'\')"><div style="width:150px;height:75px;"><br/><img src="'.$path.$imagename.'" style="max-height:75px;max-width:150px;border-radius:5px;"/></div><br/><div style="width:150px;height:45px;">'.$imagename.'</div></a>
			</div>';
		if(count($images)==0)
			break;					
		}
	echo '</div>';
}
	
	echo'</div>
	';
}


public function insertwysiwygscript($textareanum){
echo '
<script src="wysiwyg/nicedit/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {';
						   
for($i=1;$i<$textareanum+1;$i++){  	
	echo 'new nicEditor({fullPanel : true}).panelInstance("area'.$i.'");';
}
echo '});
</script>
';
}


public function displayadminfooter(){
	
echo' 
</div>
</div><br/><br/>
</div>

</body>
</html>';
}
}
}
?>