<?php
		if(!isset($_SESSION['un']))
		{
			header("location:error.php");	
		}
?>
	<table width="900px" height="50px" bgcolor="#333333">
    <tr>
    <td>
    <form action="profile.php" method="post">
	<input type="text" name="searchvalue" style="width:400px;height:19px" />
	<select name="searchby" style="height:25px">
	<option value="ex_st_no">EXAM NO</option>
	<option value="ex_status">STATUS</option>
	<option value="ex_tp">TYPE</option>
    <option value="ex_dt">DATE OF APPEARANCE</option>
    </select>
	<input type="submit" value="GO" style="height:25px;background-color:#F96;color:#FFFFFF;border-color:#F96" />
    <input type="Reset" value="Cancel" style="height:25px;background-color:#F96;color:#FFFFFF;border-color:#F96"/>
    </form></td></tr></table><br /><br /><br />