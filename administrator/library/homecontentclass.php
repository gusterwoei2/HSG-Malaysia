<?php

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
class homecontentclass{
		
public function homecontentform($changetype, $changeid){
	
$title= "";
$status = "";
$content = "";

require('opendb.php');
$page = new adminpage();
	
if($changetype == "edit"){
	$querystr = "select * from homecontent where id='".$changeid."'";
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$title = $row['title'];
	$status = $row['status'];
	$content = $row['content'];
}

echo'

<texttitle>'.strtoupper($changetype).' HOME CONTENT</texttitle>
<div id="errormsg" style="color:#FF0000">
</div>
<br/>

<form action="library/homecontentadd.php" method="post">
<table border="0px" style="width:800px;margin-left:-10px" cellpadding="10px">

<tr>
<td width="100px">Title:</td>
<td width="700px"><input type="text" size="50" maxlength="50" name="title" id="title" value="'.$title.'" onkeypress="return event.keyCode != 13;"/>*</td>
</tr>

<tr>
<td width="100px">Status:</td>
<td width="700px">
<select name="status" style="width:100px">
  <option value="1"';
  if($status==1) echo 'selected="selected"';
  echo '>Show</option>
  <option value="0"';
  if($status==0) echo 'selected="selected"';
  echo '>No Show</option>
</select>
</td>
</tr>
</table>
<br/>';

$page->insertwysiwygscript(1);

echo 'Note: Maximum Width for Home Content is 400px.<br/><br/>
<textarea style="width:408px;height:200px;" id="area1" name="area1">'.$content.'</textarea>

<input type="hidden" name="actiontype" value="'.$changetype.'">
<input type="hidden" name="id" value="'.$changeid.'"/>
<input type="submit" id="submitdata" style="visibility:hidden;margin-top:5px;"/>
</form>
<br/><br/>
<div style="width:110px;margin-top:-30px;">
<a href="#" style="text-decoration:none;" onclick="verifyandsavehomecontent()"><div class="adminbutton">Save</div></a>
</div>
';

require('closedb.php');
}


public function homecontentlistitem(){

require('opendb.php');

$querystr = "select * from homecontent order by status desc, id desc";
$result = $dbconn->query($querystr);

echo '<div><br/><br/><br/><br/>

<texttitle>EDIT/DELETE HOME CONTENT</texttitle>
<br/><br/>

	<table class="tabulatedata">
   <tr>
	<th width="50" scope="col">Delete</th>
    <th width="250" scope="col">Title</th>
    <th width="350" scope="col">Content</th>
    <th width="50" scope="col">Status</th>
  </tr>';
  
$n=0;
while (($row = $result->fetch_assoc())&& $n<100){
echo '<tr ';

if($row["status"]== 0)
	echo 'style="background:#E6E6E6;"';

if(strlen($row["content"])>50)
	$content = htmlspecialchars(substr($row["content"],0,47)).'...';
else
	$content = $row["content"];

echo'>	
    <td style="text-align:center;"><a href="#" onclick="deletedata(\'database\',\'homecontent\',\''.$row["id"].'\')"><img src="images/remove.png" width="20px"/></a></td>
    <td><a href="homecontentedit.php?id='.$row["id"].'">'.$row["title"].'</td>
    <td>'.$content.'</td>
    <td>'.$row["status"].'</td>
	</tr>';
	
$n+=1;
	
}

echo '</table></div>';


require('closedb.php');
	
}	

}

}

?>
