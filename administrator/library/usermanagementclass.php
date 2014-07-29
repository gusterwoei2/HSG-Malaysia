<?php

if(!isset($_SESSION['username'])){
	header ('Location:index.php');
}else{
	
class usermanagementclass{
		
public function usermanagementform($errorstr){
	
require('opendb.php');
$page = new adminpage();
	
echo'
<texttitle>ADD USER</texttitle>
<div id="errormsg" style="color:#FF0000">'.$errorstr.'
</div>
<br/><br/>

<form action="library/usermanagementadd.php" method="post" onkeypress="return event.keyCode != 13;">
<table border="0px" style="width:800px;margin-left:-10px" cellpadding="10px">

<tr>
<td width="100px">Username:</td>
<td width="700px"><input type="text" size="50" maxlength="20" name="username" />*</td>
</tr>

<tr>
<td width="100px">User Rank:</td>
<td width="700px">
<select name="rank" style="width:200px">
  <option value="dataentry"> Data Entry Administrator</option>
  <option value="master"> Master Administrator</option>
</select>
</td>

</table>
<br/>
<input type="hidden" name="actiontype" value="add">
<input type="submit" class="adminbutton adjustbutton" Value="Save">
</form>

';

}


public function usermanagementlistitem(){

require('opendb.php');

$querystr = "select * from users order by rank desc, username asc";
$result = $dbconn->query($querystr);

echo '<div><br/><br/><br/><br/>

<texttitle>EDIT/DELETE BANNER</texttitle>
<br/><br/>

	<table class="tabulatedata">
   <tr>
    <th width="100" scope="col">Delete</th>
    <th width="100" scope="col">Reset Password</th>
    <th width="200" scope="col">Username</th>
    <th width="200" scope="col">User Rank</th>
  </tr>';

$n=0;
while (($row = $result->fetch_assoc())&& $n<100){
echo '<tr>
    <td style="text-align:center;"><a href="#" onclick="deletedata(\'database\',\'users\',\''.$row["id"].'\')"><img src="images/remove.png" width="20px"/></a></td>
    <td style="text-align:center;"><a href="#" onclick="resetpassword(\''.$row["id"].'\')"><img src="images/reset.jpg" width="20px"/></a></td>
    <td>'.$row["username"].'</td>
    <td>'.$row["rank"].'</td>
  </tr>
  <form action="library/usermanagementadd.php" method="post"><input type="hidden" name="actiontype" value="reset"/><input type="hidden" name="id" value="'.$row["id"].'"/><input type="hidden" name="username" value="'.$row["username"].'"/><input type="submit" style="visibility:hidden;" id="submitreset'.$row["id"].'"/></form>
  ';
  
$n+=1;
	
}

echo '</table></div>';

require('closedb.php');
	
}	

}

}

?>
