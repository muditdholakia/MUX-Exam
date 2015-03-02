<?php
		if(!isset($_SESSION['ua']))
		{
			header("location:error.php");	
		}
?>
<table  width="100%">
<tr bgcolor="#CCCCCC">
	<td>First name</td>
    	<td>Last name</td>
        	<td>Mobile.no.</td>
            	<td>Gender</td>
                	<td>Email-id</td>
            			<td>Edit</td>
                			<td>Delete</td>
                            
</tr>
<?php
$h=1;
while($row = mysql_fetch_array($result))
{
$srno = $row[0];
$fnm = $row[1];
$lnm = $row[2];
$mobb = $row[9];
$gen =$row[7];
$em =$row[8];
if($h%2!=0)
{
echo "<tr><td>$fnm</td><td>$lnm</td><td>$mobb</td><td>$gen</td><td>$em</td><td><a href='register.php?srno=".$srno."'>Edit</a></td><td><a href='del_student.php?srno=".$srno."'>Delete</a></td></tr>";
$h=$h+1;
}
else
{
echo "<tr bgcolor='#F96'><td>$fnm</td><td>$lnm</td><td>$mobb</td><td>$gen</td><td>$em</td><td><a href='register.php?srno=".$srno."'>Edit</a></td><td><a href='del_student.php?srno=".$srno."'>Delete</a></td></tr>";	
$h=$h+1;
}
}
?>

</table>   