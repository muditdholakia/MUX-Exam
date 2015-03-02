<?php
		if(!isset($_SESSION['un']))
		{
			header("location:error.php");	
		}
?>
<table  width="100%">
<tr bgcolor="#CCCCCC">
	<td>EXAM ID</td>
    	<td>EXAM STATUS</td>
        	<td>ATTEMPTED QUESTION</td>
            	<td>DISCARDED QUESTION</td>
                	<td>TYPE</td>
            			<td>SUBJECT</td>
                			<td>DATE</td>
                            	<td>OBTAINED</td>
                            
</tr>
<?php
$h=1;
while($row = mysql_fetch_array($result))
{
$srno = $row[0];
$fnm = $row[1];
if($fnm=="PENDING")
{
$fnm="<a href='pendingon.php?exno=$srno&type=$row[5]' style='color:black'>PENDING</a>";	
}
$lnm = $row[3];
$mobb = $row[4];
$gen =$row[5];
$em =$row[6];
$ddd =$row[7];
$ob=$row[8];
if($h%2!=0)
{
echo "<tr><td>$srno</td><td>$fnm</td><td>$lnm</td><td>$mobb</td><td>$gen</td><td>$em</td><td>$ddd</td><td>$ob</td></tr>";
$h=$h+1;
}
else
{
echo "<tr bgcolor='#F96'><td>$srno</td><td>$fnm</td><td>$lnm</td><td>$mobb</td><td>$gen</td><td>$em</td><td>$ddd</td><td>$ob</td></tr>";	
$h=$h+1;
}
}
?>

</table>   