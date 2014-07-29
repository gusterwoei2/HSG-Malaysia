<?php   
echo'
<!-- Content Space Allocation Beginning Tag-->
<div id="bgcontent">
<div id="pncontent">
<!-- Content Space Allocation Beginning Tag-->
';

$querystr ='select id, imageurl, title, datestart, DATE_FORMAT(datestart, "%e %b %Y") as ndatestart, DATE_FORMAT(dateend, "%e %b %Y") as ndateend, TIME_FORMAT(timestart, "%l:%i %p") as timestart, TIME_FORMAT(timeend, "%l:%i %p") as timeend, venue, summary, linktype, link from events where status=1 and dateend >= CURRENT_DATE() order by datestart asc';

$result = $dbconn->query($querystr);

while ($row = $result->fetch_assoc()){
	if($row["ndatestart"]<>$row["ndateend"]){
		$date = $row["ndatestart"].' - '.$row["ndateend"];
	}
	else{
		$date = $row["ndatestart"];
	}


if($row["linktype"]=="modalbox"){
	$link = '#';
	$target = '';
}
else{
	$link = $row['link'];
	$target = '" target="_blank';
}
	

	echo'
	<div style="clear:both;">
	
	<div style="float:left;width:200px; height:150px; padding:0px 10px 20px 0px;"> 
	<a href="'.$link.$target.'" id="imglink'.$row["id"].'"><img class="needhovereffect" style="-webkit-border-radius:10px 10px 10px 10px;-moz-border-radius:10px 10px 10px 10px; border-radius:10px 10px 10px 10px; box-shadow:-1px -1px 8px 1px #D8D8D8; -webkit-box-shadow:-1px -1px 8px 1px #D8D8D8; -moz-box-shadow:-1px -1px 8px 1px #D8D8D8;" src="images/events/'.$row["imageurl"].'" width="200px" height="150px"/></a><br/>
	</div>
	
	<div style="float:left;width:400px;padding:0px 10px 20px 0px;">
	<b><a href="'.$link.$target.'" id="titlelink'.$row["id"].'"><u>'.$row["title"].'</u></a><br/>
	Date: '.$date.'<br/>Time: '.$row["timestart"].' - '.$row["timeend"].'<br/>Venue: '.$row["venue"].'</b><br/><br/>'.$row["summary"].'
	</div>	
	</div>';


if($row["linktype"]=="modalbox"){
	echo'
	<!--Modal Box Content and Setting-->
	
	<div id="modal'.$row["id"].'" class="modal">
	<div id="heading'.$row["id"].'" class="heading">'.$row["title"].'
	<div style="font-size:15px; font-weight:normal;padding-top:5px;">
	Date: '.$date.'&emsp;&emsp;&emsp;&emsp;Time: '.$row["timestart"].' - '.$row["timeend"].'&emsp;&emsp;&emsp;&emsp;Venue: '.$row["venue"].'</div>
	</div>
	
	<div id="content'.$row["id"].'" class="content">
	<div><p>'.$row["summary"].'</p>'.$row["link"].'
	</div>
	<center>
		<br/>
		<br/>
		<a href="#" style="text-decoration:none;color:#fff">
		<div class="button close">
		Close
		</div>
		</a>
	</center>
	</div>
	</div>

	<!--jQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="javascript/jquery.reveal.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#titlelink'.$row["id"].'").click(function(e) { // Button which will activate our modal
			   	$("#modal'.$row["id"].'").reveal({ // The item which will be opened with reveal
				  	animation: "fadeAndPop",                   // fade, fadeAndPop, none
					animationspeed: 600,                       // how fast animtions are
					closeonbackgroundclick: true,              // if you click background will modal close?
					dismissmodalclass: "close"    // the class of a button or element that will close an open modal
				});
			return false;
			});
			
			$("#imglink'.$row["id"].'").click(function(e) { // Button which will activate our modal
			   	$("#modal'.$row["id"].'").reveal({ // The item which will be opened with reveal
				  	animation: "fadeAndPop",                   // fade, fadeAndPop, none
					animationspeed: 600,                       // how fast animtions are
					closeonbackgroundclick: true,              // if you click background will modal close?
					dismissmodalclass: "close",    // the class of a button or element that will close an open modal
				});
			return false;
			});
		});
	</script>
	<!--Modal Box Content and Setting-->
	';
}
	
}

echo'
<!-- Content Space Allocation Ending Tags-->
</div></div>
<!-- Content Space Allocation Ending Tags-->
';

?>