<?php
if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
class homesmalladsclass{
		
public function homesmalladsform($changetype, $changeid){
	

$title="";
$introline = "";
$link = "";
$target = "";	
$position = "";
$image = "";

require('opendb.php');
$page = new adminpage();
	
if($changetype == "edit"){
	$querystr = "select * from homesmallads where id='".$changeid."'";
	$result =$dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$title = $row['title'];
	$introline = $row['introline'];	
	$link = $row['link'];
	$target = $row['target'];
	$position = $row['position'];
	$image = $row['imageurl'];	
}
	
	
echo'
<texttitle>'.strtoupper($changetype).' HOME SMALL ADS</texttitle>
<div id="errormsg" style="color:#FF0000"></div>
<br/><br/>

<form action="library/homesmalladsadd.php" method="post" onkeypress="return event.keyCode != 13;">
<table border="0px" style="width:800px;margin-left:-10px" cellpadding="10px">

<tr>
<td width="100px">Title:</td>
<td width="700px"><input type="text" size="50" maxlength="50" name="title" id="title" value="'.$title.'"/>*</td>
</tr>

<tr>
<td width="100px">Intro Line:</td>
<td width="700px"><input type="text" size="50" maxlength="120" name="introline" id="introline" value="'.$introline.'"/>*</td>
</tr>

<tr>
<td width="100px">Link:</td>
<td width="700px"><input type="text" size="50" maxlength="400" name="link" value="'.$link.'"/></td>
</tr>

<tr>
<td width="100px">Target:</td>
<td width="700px">
<select name="target" style="width:200px">
  <option value="_self"'; if($target=="_self") echo 'selected="selected"';echo'>_self</option>
  <option value="_blank"'; if($target=="_blank") echo 'selected="selected"';echo'>_blank</option>
</select>
</td>

</tr>

<tr>
<td width="100px">Position:</td>
<td width="700px"><input type="text" size="50" maxlength="2" name="position" id="position" value="'.$position.'"/>*</td>
</tr>

<tr>
<td width="100px">Select Image:</td>
<td width="700px"><input type="text" size="50" maxlength="400" name="image" id="image" value="'.$image.'" style="background:#CCC;"/>* Optimum Image Size: 190pixels x 140pixels</td>
</tr>
</table>
<input type="hidden" name="actiontype" value="'.$changetype.'"/>
<input type="hidden" name="id" value="'.$changeid.'"/>
<input type="submit" id="submitdata" style="visibility:hidden;">
</form>

<br/>
<div style="width:110px;margin-top:-30px;">
<a href="#" style="text-decoration:none;" id="btnverifyandsave" onclick="verifyandsavehomesmallads()" ><div class="adminbutton">Save</div></a>
</div>';

$page->insertmodalboximage('../images/home/');

require('closedb.php');
}


public function homesmalladslistitem(){

require('opendb.php');

$querystr = "select * from homesmallads order by position desc";
$result = $dbconn->query($querystr);

echo '<div><br/><br/><br/><br/>

<texttitle>EDIT/DELETE HOME SMALL ADS</texttitle>
<br/><br/>

	<table class="tabulatedata">
  <tr>
    <th width="50" scope="col">Delete</th>
    <th width="150" scope="col">Title</th>
    <th width="200" scope="col">Introline</th>
    <th width="100" scope="col">Image</th>
    <th width="100" scope="col">Link</th>
    <th width="50" scope="col">Target</th>
    <th width="50" scope="col">Position</th>
  </tr>';

$n=0;
while (($row = $result->fetch_assoc())&& $n<100){
echo '<tr ';

if($row["position"]== 0)
	echo 'style="background:#E6E6E6;"';
	
echo '>
    <td style="text-align:center;"><a href="#" onclick="deletedata(\'database\',\'homesmallads\',\''.$row["id"].'\')"><img src="images/remove.png" width="20px"/></a></td>
    <td><a href="homesmalladsedit.php?id='.$row["id"].'">'.$row["title"].'</td>
    <td>'.$row["introline"].'</td>
    <td style="text-align:center;"><div><img src="../images/home/'.$row["imageurl"].'" height="100px" alt="Special Function/ Image Not Available"/></div></td>
    <td>'.$row["link"].'</td>
    <td>'.$row["target"].'</td>
    <td style="text-align:center;">'.$row["position"].'</td>
	  </tr>';
$n+=1;

}

echo '</table></div>';

require('closedb.php');
	
}	

}

}

?>
