<?php   
echo'
<!-- Content Space Allocation Beginning Tag-->
<div id="bgcontent">
<div id="pncontent">
<!-- Content Space Allocation Beginning Tag-->
';

$querystr ='select id, author, title, DATE_FORMAT(date, "%e %b %Y") as testimonydate, imageurl, summary, content from miracles where status=1 order by date desc';

$result = $dbconn->query($querystr);

while ($row = $result->fetch_assoc()){
	echo'
	<div style="clear:both;">
	
	<div style="float:left;width:200px; height:150px; padding:0px 10px 20px 0px;"> 
	<a href="#" id="imglink'.$row["id"].'"><img class="needhovereffect" style="-webkit-border-radius:10px 10px 10px 10px;-moz-border-radius:10px 10px 10px 10px; border-radius:10px 10px 10px 10px; box-shadow:-1px -1px 8px 1px #D8D8D8; -webkit-box-shadow:-1px -1px 8px 1px #D8D8D8; -moz-box-shadow:-1px -1px 8px 1px #D8D8D8;" src="images/miracles/'.$row["imageurl"].'" width="200px" height="150px"/></a><br/>
	</div>
	
	<div style="float:left;width:400px;padding:0px 10px 20px 0px;">
	<b><a href="#" id="titlelink'.$row["id"].'"><u>'.$row["title"].' by '.$row["author"].'</u></a><br/>
	Date: '.$row["testimonydate"].'</b><br/><br/>'.$row["summary"].'
	</div>	
	</div>';

	echo'
	<!--Modal Box Content and Setting-->
	
	<div id="modal'.$row["id"].'" class="modal">
	<div id="heading'.$row["id"].'" class="heading">'.$row["title"].' by '.$row["author"].'
	<div style="font-size:15px; font-weight:normal;padding-top:5px;">
	Date: '.$row["testimonydate"].'</div>
	</div>
	
	<div id="content'.$row["id"].'" class="content">
	<div>'.$row["content"].'
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

echo'
<!-- Content Space Allocation Ending Tags-->
</div></div>
<!-- Content Space Allocation Ending Tags-->
';

?>