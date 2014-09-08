 <?php
if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
class eventsclass{
		
public function eventsform($changetype, $changeid){
	
$datestart= "";
$dateend = "";
$timestart = "";
$timeend = "";
$title= "";
$summary = "";
$image = "";
$venue = "";
$link = "";
$linktype = "";
$status = "";


require('opendb.php');
$page = new adminpage();
	
echo 'getting events from the db';
if($changetype == "edit"){
	$querystr = "select * from events where id='".$changeid."'";
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$datestart= $row["datestart"];
	$dateend = $row["dateend"];
	$timestart = $row["timestart"];
	$timeend = $row["timeend"];
	$title= $row["title"];
	$summary = $row["summary"];
	$image = $row["imageurl"];
	$venue = $row["venue"];
	$linktype = $row["linktype"];
	$link = $row["link"];
	$status = $row["status"];

	echo "event query = " . $querystr;
}



echo'

<texttitle>'.strtoupper($changetype).' EVENT</texttitle>
<div id="errormsg" style="color:#FF0000">
</div>
<br/>

<form action="library/eventsadd.php" method="post">
<table border="0px" style="width:800px;margin-left:-10px" cellpadding="10px"  onkeypress="return event.keyCode != 13;">

<tr>
<td width="58px">Date Start:</td>
<td width="200px"><input type="date" name="datestart" id="datestart" value="'.$datestart.'" style="width:159px;"  />*</td>
<td width="58px">Date End:</td>
<td width="200px"><input type="date" name="dateend" id="dateend"value="'.$dateend.'" style="width:159px;"/>*</td>
</tr>

<tr>
<td width="58px">Time Start:</td>
<td width="200px"><input type="time" name="timestart" value="'.$timestart.'" style="width:160px;" />*</td>
<td width="58px">Time End:</td>
<td width="200px"><input type="time" name="timeend" value="'.$timeend.'" style="width:160px;" />*</td>
</tr>
</table>

<table border="0px" style="width:800px;margin-left:-10px" cellpadding="10px">

<tr>
<td width="100px">Title:</td>
<td width="700px"><input type="text" size="100" maxlength="100" name="title" value="'.$title.'"  id="title" onkeypress="return event.keyCode != 13;"/>*</td>
</tr>
<tr>
<td width="100px">Summary:</td>
<td width="700px"><textarea name="summary" id="summary" style="width:618px;height:110px;resize:none;font-family:Verdana;"/>'.$summary.'</textarea>*</td>
</tr>
<tr>
<td width="100px">Image:</td>
<td width="700px"><input type="text" size="100" maxlength="400" name="image" id="image" value="'.$image.'" onkeypress="return event.keyCode != 13;"/>*</td>
</tr>
<tr>
<td width="100px">Venue:</td>
<td width="700px"><input type="text" size="100" maxlength="100" name="venue" id="venue" value="'.$venue.'"  onkeypress="return event.keyCode != 13;"/>*</td>
</tr>

<tr>
<td width="100px">Status:</td>
<td width="700px">
<select name="status" style="width:200px">
  <option value="1"';
  if($status==1) echo 'selected="selected"';
  echo '>Show</option>
  <option value="0"';
  if($status==0) echo 'selected="selected"';
  echo '>No Show</option>
</select>
</td>
</tr>

<tr>
<td width="100px">Link Type:</td>
<td width="700px">
<select name="linktype" style="width:200px">
  <option value="modalbox"';
  if($linktype=='modalbox') echo 'selected="selected"';
  echo '>Modal Box</option>
  <option value="externallink"';
  if($linktype=='externallink') echo 'selected="selected"';
  echo '>External Link</option>
</select>
</td>
</tr>
</table>';

$page->insertwysiwygscript(1);

echo 'External Link / Event Content For Modal Box:<br/>Note: Maximum Width for Home Content is 700px.<br/><br/>
<textarea style="width:708px;height:200px;" id="area1" name="area1">'.$link.'</textarea>




<br/>

<input type="hidden" name="actiontype" value="'.$changetype.'">
<input type="hidden" name="id" value="'.$changeid.'"/>
<input type="submit" id="submitdata" style="visibility:hidden;margin-top:5px;"/>
</form>
<br/>
<div style="width:110px;margin-top:-30px;">
<a href="#" style="text-decoration:none;" onclick="verifyandsaveevent()"><div class="adminbutton">Save</div></a>
</div>
';

$page->insertmodalboximage('../images/events/');

require('closedb.php');
}


public function eventslistitem(){

require('opendb.php');

$querystr = 'select id, DATE_FORMAT(datestart, "%e/%c/%Y") as edatestart, DATE_FORMAT(dateend, "%e/%c/%Y") as edateend, dateend, TIME_FORMAT(timestart, "%l:%i %p") as timestart, TIME_FORMAT(timeend, "%l:%i %p") as timeend, title, summary, imageurl, venue, link, linktype, status from events order by dateend desc, status desc';

$result = $dbconn->query($querystr);

echo '<div><br/><br/><br/><br/>

<texttitle>EDIT/DELETE EVENTS</texttitle>
<br/><br/>

	<table class="tabulatedata">
   <tr>
	<th width="50px" scope="col">Delete</th>
    <th width="130px" scope="col">Date</th>
    <th width="200px" scope="col">Time</th>
	<th width="100px" scope="col">Title</th>
	<th width="100px" scope="col">Summary</th>
	<th width="80px" scope="col">Image</th>
	<th width="70px" scope="col">Venue</th>
	<th width="50px" scope="col">Link Type</th>
	<th width="20px" scope="col">Link</th>
	<th width="50px" scope="col">Status</th>
	
  </tr>';
  

$n=0;
while (($row = $result->fetch_assoc())&& $n<100){
	
if(strlen($row["summary"])>30)
	$summary = htmlspecialchars(substr($row["summary"],0,27)).'...';
else
	$summary = $row["summary"];
	
if(strlen($row["link"])>15)
	$content = htmlspecialchars(substr($row["link"],0,12)).'...';
else
	$content = $row["link"];

echo '<tr ';

if(strtotime($row["dateend"])<strtotime(date("Y-m-d")) || $row["status"]== 0)
	echo 'style="background:#E6E6E6;"';
	
echo'>
    <td style="text-align:center;"><a href="#" onclick="deletedata(\'database\',\'events\',\''.$row["id"].'\')"><img src="images/remove.png" width="20px"/></a></td>
	<td style="text-align:center;">'.$row["edatestart"].' <br/>to<br/> '.$row["edateend"].'</td>
	<td style="text-align:center;">'.$row["timestart"].' <br/>to<br/> '.$row["timeend"].'</td>
    <td><a href="eventsedit.php?id='.$row["id"].'">'.$row["title"].'</td>
    <td>'.$summary.'</td>
    <td style="text-align:center;"><img src="../images/events/'.$row["imageurl"].'" width="100px" height="50px"/></td>
	<td>'.$row["venue"].'</td>
	<td>'.$row["linktype"].'</td>
    <td>'.$content.'</td>
    <td style="text-align:center;">'.$row["status"].'</td>';

echo '</tr>';
	
$n+=1;

}

echo '</table></div>';


require('closedb.php');
	
}	

}

}

?>

