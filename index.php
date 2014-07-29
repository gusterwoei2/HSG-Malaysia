<?php
require('library/page.php');
require('library/opendb.php');

$setpage = new page();
$setpage->pagename ='home';
$setpage->displayheader();
$setpage->displaysubmenu();
?>

<!-- Content Space Allocation Beginning Tag-->
<div id="bgcontent">
<div id="pncontent">
<!-- Content Space Allocation Beginning Tag-->
    
<?php    	
	//Home Content
	echo '<div style="width:400px;float:left;padding:10px 25px 0px 25px;">';

	$querystr ='select content from homecontent where status=1';
	$result =$dbconn->query($querystr);
	$row = $result->fetch_assoc();
	
	echo $row["content"];
	echo '</div>';

			
	$querystr = 'select title, imageurl, link, target, introline from homesmallads where position<>0 order by position asc';
	$result = $dbconn->query($querystr);	
	$numrow = $result->num_rows;
	
	$mquery = 'select multiplier from hsatbw where id=1';
	$mresult = $dbconn->query($mquery);
	$mrow = $mresult->fetch_assoc();
	$multiplier = $mrow['multiplier'];
	
	$adsdetails = array();
	while ($row = $result->fetch_assoc()) {
		array_push($adsdetails, array($row["title"],$row["imageurl"],$row["link"],$row["target"],$row["introline"]));
	}
	
	
        echo '<div style="width:430px;float:left;padding:10px;"><div style="height:auto;">';
		

		
		//HomeSamllAds 1 Begin	
	    echo '<div class="homesmallads" style="padding:0px 5px 5px 0px;">';
		
		if($numrow>=1){
         	echo '<div class="homesmalladstitlebg"><div class="homesmalladstitle" style="width:'.(strlen($adsdetails[0][0])*$multiplier).'px">'.$adsdetails[0][0].'</div></div><br/><div class="homesmalladsimage">';
					
		if($adsdetails[0][2]<>""){
			echo '<a href="'.$adsdetails[0][2].'" target="'.$adsdetails[0][3].'">';
		}
				
		echo '<img src="images/home/';
		
		if(substr($adsdetails[0][1],0,9)=="include('")
			eval ($adsdetails[0][1]);
		else
			echo ($adsdetails[0][1]);
			
		echo'"/>';
		
		if($adsdetails[0][2]<>""){
			echo '</a>';
		}
		
		echo '</div><br/><div class="homesmalladsnote">'.$adsdetails[0][4].'</div>';
		}
		echo '</div>';
		//HomeSamllAds 1 End
	
                
               
                
		//HomeSamllAds 2 Begin
	    echo  '<div class="homesmallads" style="padding:0px 0px 5px 5px;">';
		
		if($numrow>=2){
        echo  '<div class="homesmalladstitlebg"><div class="homesmalladstitle" style="width:'.(strlen($adsdetails[1][0])*$multiplier).'px">'.$adsdetails[1][0].'</div></div><br/><div class="homesmalladsimage">';
					
		if($adsdetails[1][2]<>""){
			echo '<a href="'.$adsdetails[1][2].'" target="'.$adsdetails[1][3].'">';
		}
				
		echo '<img src="images/home/'.$adsdetails[1][1].'"/>';
		
		if($adsdetails[1][2]<>""){
			echo '</a>';
		}
		
		echo '</div><br/><div class="homesmalladsnote">'.$adsdetails[1][4].'</div>';     			
		}
		echo '</div>';
		//HomeSamllAds 2 End
		
		
            
        echo '</div>';
            
        echo '<div style="height:auto;">';
		
		
		
		
		//HomeSamllAds 3 Begin
	    echo '<div class="homesmallads" style="padding:5px 5px 5px 0px;">';
		
		if($numrow>=3){
        echo  '<div class="homesmalladstitlebg"><div class="homesmalladstitle" style="width:'.(strlen($adsdetails[2][0])*$multiplier).'px">'.$adsdetails[2][0].'</div></div><br/><div class="homesmalladsimage">';
					
		if($adsdetails[2][2]<>""){
			echo '<a href="'.$adsdetails[2][2].'" target="'.$adsdetails[2][3].'">';
		}
				
		echo '<img src="images/home/'.$adsdetails[2][1].'"/>';
		
		if($adsdetails[2][2]<>""){
			echo '</a>';
		}
		
		echo '</div><br/><div class="homesmalladsnote">'.$adsdetails[2][4].'</div>';     			
		}
		echo '</div>';		
		//HomeSamllAds 3 End
		
		
		//HomeSamllAds 4 Begin
	    echo '<div class="homesmallads" style="padding:5px 0px 5px 5px;">';
		
		if($numrow>=4){
		echo'     <div class="homesmalladstitlebg"><div class="homesmalladstitle" style="width:'.(strlen($adsdetails[3][0])*$multiplier).'px">'.$adsdetails[3][0].'</div></div><br/><div class="homesmalladsimage">';
					
		if($adsdetails[3][2]<>""){
			echo '<a href="'.$adsdetails[3][2].'" target="'.$adsdetails[3][3].'">';
		}
				
		echo '<img src="images/home/'.$adsdetails[3][1].'"/>';
		
		if($adsdetails[3][2]<>""){
			echo '</a>';
		}
		
		echo '</div><br/><div class="homesmalladsnote">'.$adsdetails[3][4].'</div>';
		}
		echo '</div>';
		//HomeSamllAds 4 End
	
		echo '</div></div>';
?>

<!-- Content Space Allocation Ending Tags-->
</div></div>
<!-- Content Space Allocation Ending Tags-->
             
<?php
$setpage->displayfooter();
require('library/closedb.php');
?>

