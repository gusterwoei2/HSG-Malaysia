<?php

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
class bannerclass{
		
public function bannerform($changetype, $changeid){
	
$title="";
$link = "";
$target = "";
$displaypage = "";	
$position = "";
$image = "";

require('opendb.php');
$page = new adminpage();
	
if($changetype == "edit"){
	$querystr = "select * from banner where id ='".$changeid."'";
	$result =$dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$title = $row['title'];
	$link = $row['link'];
	$target = $row['target'];
	$displaypage = $row['displaypage'];	
	$position = $row['position'];
	$image = $row['imageurl'];	
}

echo'
<texttitle>'.strtoupper($changetype).' BANNER</texttitle>
<div id="errormsg" style="color:#FF0000">
</div>
<br/><br/>

<form action="library/banneradd.php" method="post" onkeypress="return event.keyCode != 13;">
<table border="0px" style="width:800px;margin-left:-10px" cellpadding="10px">

<tr>
<td width="100px">Title:</td>
<td width="700px"><input type="text" size="50" maxlength="50" name="title" id="title" value="'.$title.'"/>*</td>
</tr>

<tr>
<td width="100px">Link:</td>
<td width="700px"><input type="text" size="50" maxlength="400" name="link" value="'.$link.'"/></td>
</tr>

<tr>
<td width="100px">Target:</td>
<td width="700px">
<select name="target" style="width:200px">
  <option value="_self" '; if($target =="_self") echo 'selected="selected"'; echo'>_self</option>
  <option value="_blank" '; if($target=="_blank") echo 'selected="selected"'; echo'>_blank</option>
</select>
</td>

</tr>

<tr>
<td width="100px">Display Page:</td>
<td width="700px">
<select name="displaypage" style="width:200px">
  <option value="Home" '; if($displaypage=="Home") echo 'selected="selected"';echo'>Home</option>
  <option value="About" '; if($displaypage=="About") echo 'selected="selected"';	echo'>About</option>
  <option value="Functions" '; if($displaypage=="Functions") echo 'selected="selected"';	echo'>Functions</option>
  <option value="Missions" '; if($displaypage=="Missions") echo 'selected="selected"';	echo'>Missions</option>
  <option value="Testimonies" '; if($displaypage=="Testimonies") echo 'selected="selected"';	echo'>Testimonies</option>
  <option value="Media" '; if($displaypage=="Media") echo 'selected="selected"';	echo'>Media</option>    
</select>*</td>
</tr>

<tr>
<td width="100px">Position:</td>
<td width="700px"><input type="text" size="50" maxlength="400" name="position" id="position" value="'.$position.'"/>*</td>
</tr>

<tr>
<td width="100px">Select Image:</td>
<td width="700px"><input type="text" size="50" maxlength="400" name="image" id="image" value="'.$image.'" style="background:#CCC;"/>*</td>
</tr>
</table>
<input type="hidden" name="actiontype" value="'.$changetype.'"/>
<input type="hidden" name="id" value="'.$changeid.'"/>
<input type="submit" id="submitdata" style="visibility:hidden;">
</form>

<br/>
<div style="width:110px;margin-top:-30px;">
<a href="#" style="text-decoration:none;" onclick="verifyandsavebanner()" ><div class="adminbutton">Save</div></a>
</div>
';

$page->insertmodalboximage('../banner/data1/images/');

require('closedb.php');
}


public function bannerlistitem(){

require('opendb.php');

$querystr = "select * from banner order by displaypage asc, position asc";
$result = $dbconn->query($querystr);

echo '<div><br/><br/><br/><br/>

<texttitle>EDIT/DELETE BANNER</texttitle>
<br/><br/>

	<table class="tabulatedata">
   <tr>
    <th width="45" scope="col">Delete</th>
    <th width="93" scope="col">Display Page</th>
    <th width="178" scope="col">Title</th>
    <th width="128" scope="col">Image</th>
    <th width="149" scope="col">Link</th>
    <th width="58" scope="col">Target</th>
    <th width="63" scope="col">Position</th>
  </tr>';

$n=0;
while (($row = $result->fetch_assoc())&& $n<100){
echo '<tr ';

if($row["position"]== 0)
	echo 'style="background:#E6E6E6;"';
	
echo '>
    <td style="text-align:center;"><a href="#" onclick="deletedata(\'database\',\'banner\',\''.$row["id"].'\')"><img src="images/remove.png" width="20px"/></a></td>
    <td>'.$row["displaypage"].'</td>
    <td><a href="banneredit.php?id='.$row["id"].'">'.$row["title"].'</td>
    <td style="text-align:center;"><img src="../banner/data1/images/'.$row["imageurl"].'" width="100px" height="50px"/></td>
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
