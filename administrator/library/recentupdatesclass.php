<?php
if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
class recentupdatesclass{
		
public function recentupdatesform($changetype, $changeid){
require('opendb.php');	
$message ="";	

if($changetype == "edit"){	
	$querystr = "select * from newsupdate where id='".$changeid."'";
	$result = $dbconn->query($querystr);
	$row = $result->fetch_assoc();
	$message = $row["message"];
}

echo'
<texttitle>'.strtoupper($changetype).' RECENT UPDATES</texttitle>
<div id="errormsg" style="color:#FF0000">
</div>
<br/><br/>

<form action="library/recentupdatesadd.php" method="post" onkeypress="return event.keyCode != 13;">
<table border="0px" style="width:800px;margin-left:-10px" cellpadding="10px">
<tr>
<td width="100px">Message:</td>
<td width="700px"><input type="text" size="105" maxlength="95" name="message" id="message" value="'.$message.'"/>*</td>
</tr>
</table>
<input type="hidden" name="actiontype" value="'.$changetype.'">
<input type="hidden" name="id" value="'.$changeid.'">
<input type="submit" id="submitdata" style="visibility:hidden;">
</form>

<br/>
<div style="width:110px;margin-top:-30px;">
<a href="#" style="text-decoration:none;" onclick="verifyandsaverecentupdates()" ><div class="adminbutton">Save</div></a>
</div>
';

require('closedb.php');
}


public function recentupdateslistitem(){

require('opendb.php');

$querystr = "select * from newsupdate order by status desc, date desc";
$result = $dbconn->query($querystr);

echo '<div><br/><br/><br/><br/>

<texttitle>EDIT/DELETE RECENT UPDATES</texttitle>
<br/><br/>

	<table class="tabulatedata">
   <tr>
    <th width="45" scope="col">Delete</th>
    <th width="155" scope="col">Date</th>
    <th width="600" scope="col">Message</th>
  </tr>';

$n=0;
while (($row = $result->fetch_assoc())&& $n<100){
echo '<tr ';

if($row["status"]== 0)
	echo 'style="background:#E6E6E6;"';
	
echo '>
	<td style="text-align:center;"><a href="#" onclick="deletedata(\'database\',\'newsupdate\',\''.$row["id"].'\')"><img src="images/remove.png" width="20px"/></a></td>
    <td>'.$row["date"].'</td>
    <td><a href="recentupdatesedit.php?id='.$row["id"].'">'.$row["message"].'</td>
	</tr>';
	  
$n+=1;
}

echo '</table></div>';

require('closedb.php');
	
}	

}

}

?>
