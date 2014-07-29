<?php
if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
class miraclesclass{
		
public function miraclesform($changetype, $changeid){
	
$title= "";
$author = "";
$date = "";
$image = "";
$summary = "";
$content = "";
$status = "";


require('opendb.php');
$page = new adminpage();
	
if($changetype == "edit"){
	$querystr = "select * from miracles where id='".$changeid."'";
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$title= $row["title"];
	$author = $row["author"];
	$date = $row["date"];
	$image = $row["imageurl"];
	$summary = $row["summary"];
	$content = $row["content"];
	$status = $row["status"];
}

echo'

<texttitle>'.strtoupper($changetype).' MIRACLES</texttitle>
<div id="errormsg" style="color:#FF0000">
</div>
<br/>

<form action="library/miraclesadd.php" method="post">

<table border="0px" style="width:800px;margin-left:-10px" cellpadding="10px">
<tr>
<td width="58px">Date:</td>
<td width="200px"><input type="date" name="date" id="date" value="'.$date.'" style="width:159px;"  />*</td>
</tr>
<tr>
<td width="100px">Title:</td>
<td width="700px"><input type="text" size="100" maxlength="100" name="title" value="'.$title.'"  id="title" onkeypress="return event.keyCode != 13;"/>*</td>
</tr>
<tr>
<td width="100px">Author:</td>
<td width="700px"><input type="text" size="100" maxlength="100" name="author" value="'.$author.'"  id="author" onkeypress="return event.keyCode != 13;"/>*</td>
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
<td width="100px">Status:</td>
<td width="700px">
<select name="status" style="width:100px" id="status">
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
echo'
<div width:710px;">
Left Content<br/>Note: Maximum Width is 700px:<br/><br/>
<textarea style="width:708px;height:200px;" id="area1" name="area1">'.$content.'</textarea>
</div>


<input type="hidden" name="actiontype" value="'.$changetype.'">
<input type="hidden" name="id" value="'.$changeid.'"/>
<input type="submit" id="submitdata" style="visibility:hidden;margin-top:5px;"/>
</form>
<br/>
<div style="width:110px;margin-top:-30px;">
<a href="#" style="text-decoration:none;" onclick="verifyandsavemiracles()"><div class="adminbutton">Save</div></a>
</div>
';

$page->insertmodalboximage('../images/miracles/');

require('closedb.php');
}


public function miracleslistitem(){

require('opendb.php');

$querystr = 'select id, title, author, DATE_FORMAT(date, "%e %b %Y") as tdate, summary, imageurl, content, status from miracles order by status desc, date desc';

$result = $dbconn->query($querystr);

echo '<div><br/><br/><br/><br/>

<texttitle>EDIT/DELETE MIRACLES</texttitle>
<br/><br/>

	<table class="tabulatedata">
   <tr>
	<th width="50px" scope="col">Delete</th>
    <th width="50px" scope="col">Date</th>
    <th width="100px" scope="col">Title</th>
	<th width="100px" scope="col">Author</th>
	<th width="150px" scope="col">Summary</th>
	<th width="100px" scope="col">Image</th>
	<th width="120px" scope="col">Content</th>
	<th width="70px" scope="col">Status</th>
  </tr>';
  

$n=0;
while (($row = $result->fetch_assoc())&& $n<100){
		
echo '<tr ';

if($row["status"]== 0)
	echo 'style="background:#E6E6E6;"';
	
echo '>	
    <td style="text-align:center;"><a href="#" onclick="deletedata(\'database\',\'miracles\',\''.$row["id"].'\')"><img src="images/remove.png" width="20px"/></a></td>
    <td style="text-align:center;">'.$row["tdate"].'</td>
	<td><a href="miraclesedit.php?id='.$row["id"].'">'.$row["title"].'</td>
    <td style="text-align:center;">'.$row["author"].'</td>	
    <td>'.htmlspecialchars(substr($row["summary"],0,30)).'...</td>
    <td style="text-align:center;"><img src="../images/miracles/'.$row["imageurl"].'" width="100px" height="50px"/></td>
    <td>'.htmlspecialchars(substr($row["content"],0,30)).'...</td>
    <td style="text-align:center;">'.$row["status"].'</td>
	</tr>';
	
$n+=1;
	
}

echo '</table></div>';


require('closedb.php');
	
}	

}
}


?>