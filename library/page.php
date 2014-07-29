<?php

class page{
	
public $pagename;
public $submenupageid;
public $addheadline;

public function displayheader(){
	
	require('library/opendb.php');
	
	$querystr = 'select id from submenupages where parentmenu="about" and position <> 0 order by position';
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$aboutid=$row['id'];
	
	$querystr = 'select id from submenupages where parentmenu="functions" and position <> 0 order by position';
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$functionsid=$row['id'];
	
	$querystr = 'select id from submenupages where parentmenu="missions" and position <> 0 order by position';
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$missionsid=$row['id'];
	
	$querystr = 'select id from submenupages where parentmenu="testimonies" and position <> 0 order by position';
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$testimoniesid=$row['id'];
	
	$querystr = 'select id from submenupages where parentmenu="media" and position <> 0 order by position';
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$mediaid=$row['id'];
	
	echo '
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo $this->addheadline;
	echo'
		<link rel="stylesheet" href="css/layout.css" type="text/css" />
	    <link rel="stylesheet" type="text/css" href="banner/engine1/style.css" />
		<link href="http://fonts.googleapis.com/css?family=Sintony" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="banner/engine1/jquery.js"></script>
	<title>HSG LIVE YOUR DREAMS</title>
	</head>

	<body>
	<div id="all">	
	<div id="bgmainmenu" >

  		<div id="pnmainmenu">
			<div id="logo"><img src="images/static/logo.png" width="125px"/></div>
			<div id="mainmenu"> 
				<a href="index.php" style="text-decoration:none;"><div class="bigparallelogram" id="home'; if($this->pagename=="home")echo 'selected';echo'"><div class="smallparallelogram" ><div class="menutitle">Home </div> <div class="menusubtitle">Welcome</div></div></div> </a>					
          		<a href="about.php?id='.$aboutid.'" style="text-decoration:none;"><div class="bigparallelogram" id="about'; if($this->pagename=="about")echo 'selected';echo'"><div class="smallparallelogram" ><div class="menutitle">About Us</div> <div class="menusubtitle"></div></div></div> </a>	
          		<a href="functions.php?id='.$functionsid.'" style="text-decoration:none;"> <div class="bigparallelogram" id="functions'; if($this->pagename=="functions")echo 'selected';echo'"><div class="smallparallelogram" ><div class="menutitle">Functions</div> <div class="menusubtitle">Time & Location</div></div></div>	 </a>	
         		<a href="missions.php?id='.$missionsid.'" style="text-decoration:none;"><div class="bigparallelogram" id="missions'; if($this->pagename=="missions")echo 'selected';echo'"><div class="smallparallelogram" ><div class="menutitle">Missions</div> <div class="menusubtitle">HSGGM</div></div></div>  </a>		
          		<a href="testimonies.php?id='.$testimoniesid.'" style="text-decoration:none;"><div class="bigparallelogram" id="testimonies'; if($this->pagename=="testimonies")echo 'selected';echo'"><div class="smallparallelogram" ><div class="menutitle">Testimonies</div> <div class="menusubtitle"></div></div></div> </a>';
				
	/*echo'				
          		<a href="media.php?id='.$mediaid.'" style="text-decoration:none;"><div class="bigparallelogram" id="media'; if($this->pagename=="media")echo 'selected';echo'"><div class="smallparallelogram" ><div class="menutitle">Media</div> <div class="menusubtitle">Resources</div></div></div> </a>';	 	*/

echo' 	</div>      
  		</div>
	</div>';
	
/*	Sign in button (Maybe Not Needed)
	<div id="bgsignin">
		<div id="btnsigin"> sign in </div>
	</div>
*/	


$querystr = 'select * from newsupdate where status=1';
$result = $dbconn->query($querystr);
$row = $result->fetch_assoc();

echo'  	<div id="bgads">
		<div id="pnads">
			
            <div id="pnupdates"> 
            	<img src="images/static/updatestop.jpg"/>
                <div style="height:10px;"></div>
                <div id="updatescontent">'.$row["message"].'</div>
                <div style="height:10px;"></div>
                <img src="images/static/updatesbottom.jpg"/>
            </div> 
            
           
        	<div id="pnbanner">
            
            	<!-- Start WOWSlider.com BODY section -->
				<div id="wowslider-container1">
				<div class="ws_images"><ul>';
				
	$bannerimg = array();
	$bannerlink = array();
	$bannertarget = array();
	$querystr = 'select imageurl, link, displaypage, position, target from banner where displaypage="'.$this->pagename.'" and position <>0 order by position asc';
	$result = $dbconn->query($querystr);
	while ($row = $result->fetch_assoc()) {
        array_push($bannerimg,$row["imageurl"]);
		array_push($bannerlink,$row["link"]);
		array_push($bannertarget,$row["target"]);
    }

	$linkcount = count($bannerimg);
	
	foreach($bannerimg as $banneritem){
		$link = array_shift($bannerlink);
		$target = array_shift($bannertarget);
		if ($link=="")
			echo '<li><img src="banner/data1/images/'.$banneritem.'" width="700px" height="350px"/></li>';
		else
			echo '<li><a href="'.$link.'" target="'.$target.'"><img src="banner/data1/images/'.$banneritem.'" width="700px" height="350px"/></a></li>';
	}
				
				
		echo '</ul></div>
		
				<div class="ws_bullets"><div>';
				
				for($i=1; $i<=$linkcount; $i++){
					echo '<a href="#">'.$i.'</a>';
				}
					
		echo '</div></div>
                
				</div>
				<script type="text/javascript" src="banner/engine1/wowslider.js"></script>
				<script type="text/javascript" src="banner/engine1/script.js"></script>
				<!-- End WOWSlider.com BODY section -->
            
			</div> <!--pnbanner-->        
        </div>
 	</div>';

	require('library/closedb.php');
}


public function displaysubmenu(){

	require('library/opendb.php');
	
	$submenuitem = array();
	$submenuid =array();
	$querystr = 'select id, title from submenupages where parentmenu="'.$this->pagename.'" and position<>0 order by position';
	$result = $dbconn->query($querystr);
	$numrow = $result->num_rows;
	while ($row = $result->fetch_assoc()) {
        array_push($submenuitem,$row["title"]);
        array_push($submenuid,$row["id"]);
    }
	//echo '<a name="focusanchor"></a>';
	if($numrow>0){
	$max=0;
	foreach ($submenuitem as $item){
		$len = strlen($item);
		if($max<$len){
			$max=$len;
		}
	}
	
	$width =$max*7;
	
	if ($width<=120)
		$width=120;

	echo '
		<div id="bgsubmenu">
    	<div class="pnsubmenu" id="'.$this->pagename.'submenu">';

	foreach ($submenuitem as $item){
		$currentsubmenuid = array_shift($submenuid);
		if($this->submenupageid == $currentsubmenuid)
			$addline = 'id="'.$this->pagename.'subselected"';
		else
			$addline = "";
		
		echo '<a href="'.$this->pagename.'.php?id='.$currentsubmenuid.'#focusanchor" style="color:#FFF;text-decoration:none;"><div class="submenuparallelogram"'.$addline.'style="width:'.$width.'px;"><div class="submenutitle" style="width:'.$width.'px;">'.$item.'</div></div></a>';
	}
	
	echo '</div></div>';
	}
	
	require('library/closedb.php');
	
	
}
	
public function displaycontent(){

require('library/opendb.php');
echo'	
<!-- Content Space Allocation Beginning Tag-->
<div id="bgcontent">
<div id="pncontent">
<!-- Content Space Allocation Beginning Tag-->';

$querystr ='select leftcontent, rightcontent from submenupages where parentmenu="'.$this->pagename.'" and id="'.$this->submenupageid.'"';
$result = $dbconn->query($querystr);
$row = $result->fetch_assoc();

	
echo	'<div style="float:left;width:600px;';

if($row["rightcontent"]<>"")
	echo	'-webkit-box-shadow: 10px 0px 6px -10px #555;';


echo	'padding:25px;">';

if(substr($row['leftcontent'],0,9)=="include('")
	eval ($row['leftcontent']);
else
	echo ($row['leftcontent']);

echo'</div>

<div style="float:left;width:220px;padding:10px 10px 10px 20px;">'.$row['rightcontent'].'</div>
';



echo '
<!-- Content Space Allocation Ending Tags-->
</div></div>
<!-- Content Space Allocation Ending Tags-->';

require('library/closedb.php');
}


public function displayfooter(){
		
	echo '
	<div id="bgfooter">
		<div id="pnfooter">
		<br/>
			<div class="footmenu">
			<a href="index.php"><b>HOME</b></a><br/>
			<a href="functions.php?id=11">Service Time</a><br/>
			<a href="about.php?id=5">Our Location</a><br/>
			<a href="functions.php?id=14">Upcoming Events</a><br/>
			<a href="about.php?id=1">Contact Us</a><br/>
			</div>
			<div class="footmenu">
			<a href="about.php?id=1"><b>ABOUT US</b></a><br/>
			<a href="about.php?id=2">Our Mission</a><br/>
			<a href="about.php?id=2">Our Vision</a><br/>
			<a href="about.php?id=3">Our Pastors</a><br/>
			<a href="about.php?id=4">Our Culture</a><br/>
			</div>
			<div class="footmenu">
			<a href="functions.php?id=11"><b>FUNCTIONS</b></a><br/>
			<a href="functions.php?id=11">HSG KL</a><br/>
			<a href="functions.php?id=12">HSG Penang</a><br/>
			<a href="functions.php?id=12">LWT Kajang</a><br/>
			<a href="functions.php?id=13">Carecells</a><br/>
			</div>			
			<div class="footmenu">
			<a href="missions.php?id=6"><b>HSGGM</b></a><br/>
			<a href="missions.php?id=6">Missions</a><br/>
			<a href="missions.php?id=8">Board of Directors</a><br/>
			<a href="missions.php?id=7">HSGGM</a><br/>
			</div>
			<div class="footmenu">
			<a href="testimonies.php?id=17"><b>TESTIMONIES</b></a><br/>
			<a href="testimonies.php?id=15">Real Miracles</a><br/>
			<a href="testimonies.php?id=16">The Prayer</a><br/>
			</div>			
		</div>

	<!--Copyright if needed
	<div class="copyright">
	<br/><br/>
		&copy 2013 HIS SANCTUARY OF GLORY
	</div>
	-->
	
	</div>
	
	
	
	
	</div></body></html>';
}


public function displaytable($querystr){
	require('library/opendb.php');
	
	$result = $dbconn->query($querystr);

	$tablestr = '<table style="border:1px solid black; border-collapse:collapse;" cellpadding="10">';
	while ($row = $result->fetch_row()){
		$tablestr = $tablestr.'<tr style="border:1px solid black;">';
		for ($i=0;$i<$result->field_count;$i++){
			$tablestr = $tablestr.'<td style="border:1px solid black;">'.$row[$i].'</td>';			
		}
		$tablestr = $tablestr.'</tr>';
	}
	$tablestr = $tablestr.'</table>';

	require('library/closedb.php');

	return $tablestr;
}



}
?>
