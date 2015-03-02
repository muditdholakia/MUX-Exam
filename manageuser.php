<?php 
		if(!isset($_SESSION['ua']))
		{
			header("location:error.php");	
		}
?>
	<table width="800px" height="50px" bgcolor="#333333">
    <tr>
    <td>
    <form action="admin.php" method="post">
	<input type="text" name="searchvalue" style="width:400px;height:19px" />
	<select name="searchby" style="height:25px">
	<option value="f_name">FIRSTNAME</option>
	<option value="l_name">LASTNAME</option>
	<option value="mob_no">MOBILE.NO.</option>
	<option value="gender">GENDER</option>
	<option value="email_id">EMAIL ID</option>
	</select>
	<input type="submit" value="GO" style="height:25px;background-color:#F96;
color:#FFFFFF;border-color:#F96" /><input type="Reset" value="Cancel" style="height:25px;background-color:#F96;
color:#FFFFFF;border-color:#F96"/><a href="register.php?add=add" style="text-decoration:overline;font-size:14px;color:#FFF">ADD USER</a>
	</form></td></tr></table><br /><br /><br />