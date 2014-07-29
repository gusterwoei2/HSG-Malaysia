<?php

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
class submenupageclass{
	
	
public function submenupageform($pagecode, $pagename, $redirectloc, $changetype, $changeid){

require('opendb.php');
$page = new adminpage();

$title = "";
$position = "";
$lcontent = "";
$rcontent = "";

if($changetype == "edit"){
	$querystr = "select * from submenupages where id ='".$changeid."'";
	$result =$dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$title = $row['title'];
	$position = $row['position'];
	$lcontent = $row['leftcontent'];
	$rcontent = $row['rightcontent'];	
}

echo'
<texttitle>'.strtoupper($changetype." ".$pagename).' SUBMENU AND CONTENT</texttitle>
<div id="errormsg" style="color:#FF0000">
</div>
<br/>

<form action="library/submenupageadd.php" method="post">
<table border="0px" style="width:800px;margin-left:-10px;font-size:12px;" cellpadding="10px">

<tr>
<td width="100px">Title:</td>
<td width="700px"><input type="text" size="50" maxlength="50" name="title" id="title" value="'.$title.'"onkeypress="return event.keyCode != 13;"/>*</td>
</tr>

<tr>
<td width="100px">Position:</td>
<td width="700px"><input type="text" size="50" maxlength="2" name="position" id="position" value="'.$position.'" onkeypress="return event.keyCode != 13;"/>*</td>
</tr>

</table>
<br/>';

$page->insertwysiwygscript(2);

echo '

<div style="float:left;width:610px;padding-right:10px;">
Left Content<br/>Note: Maximum Width is 600px:<br/><br/>
<textarea style="width:608px;height:274px;padding:0px;" id="area1" name="area1">'.$lcontent.'</textarea>
</div>



<div style="float:left;width:230px;">
Right Content<br/>Note: Maximum Width is 220px:
<br/><br/>
<textarea style="width:228px;height:230px;margin:0px;" id="area2" name="area2">'.$rcontent.'</textarea>
<br/>
</div>

<div style="clear:both;"></div>


<input type="hidden" name="page" value="'.$pagecode.'"/>
<input type="hidden" name="actiontype" value="'.$changetype.'"/>
<input type="hidden" name="id" value="'.$changeid.'"/>
<input type="hidden" name="redirectloc" value="'.$redirectloc.'"/>

<input type="submit" id="submitdata" style="visibility:hidden;margin-top:5px;"/>
</form>

<br/>
<div style="width:110px;margin-top:-30px;">
<a href="#" style="text-decoration:none;" onclick="verifyandsavesubmenu()" ><div class="adminbutton">Save</div></a>
</div>
';
require('closedb.php');
}


public function submenupagelistitem($pagecode, $pagename, $editpage){

require('opendb.php');

$querystr = "select * from submenupages where parentmenu='".$pagecode."' order by position desc, id asc";
$result = $dbconn->query($querystr);

echo '<div><br/><br/><br/><br/>

<texttitle>EDIT/DELETE '.strtoupper($pagename).' SUBMENU AND CONTENT</texttitle>
<br/><br/>

	<table class="tabulatedata">
   <tr>
	<th width="50px" scope="col">Delete</th>
    <th width="200px" scope="col">Title</th>
    <th width="275px" scope="col">Left Content</th>
    <th width="275px" scope="col">Right Content</th>
    <th width="50px" scope="col">Position</th>
  </tr>';
  

$n=0;
while (($row = $result->fetch_assoc())&& $n<100){
echo '<tr ';

if($row["position"]== 0)
	echo 'style="background:#E6E6E6;"';

if(strlen($row["leftcontent"])>30)
	$lcontent = htmlspecialchars(substr($row["leftcontent"],0,27)).'...';
else
	$lcontent = $row["leftcontent"];

if(strlen($row["rightcontent"])>30)
	$rcontent = htmlspecialchars(substr($row["rightcontent"],0,27)).'...';
else
	$rcontent = $row["rightcontent"];
	
echo '>

    <td style="text-align:center;"><a href="#" onclick="deletedata(\'database\',\'submenupages\',\''.$row["id"].'\')"><img src="images/remove.png" width="20px"/></a></td>
    <td><a href="'.$editpage.'.php?id='.$row["id"].'">'.$row["title"].'</td>
    <td>'.$lcontent.'</td>
    <td>'.$rcontent.'</td>
    <td>'.$row["position"].'</td>
	</tr>';
	
$n+=1;

}
echo '</table></div>';

require('closedb.php');
	
}	

}

}

?>