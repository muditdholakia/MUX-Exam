<?php
		if(!isset($_SESSION['un']))
		{
			header("location:error.php");	
		}
?>
<?php
$cc=0;
while($row = mysql_fetch_array($result))
{
$cc=$cc+1;
}
echo "<br /><br /><br />";
echo "<font style='color:black;font-size:20px'>You have given total</font>";echo ' ';echo "<font style='color:black;font-size:20px'>$cc</font>";echo ' ';echo "<font style='color:black;font-size:20px'>exams</font>";
if($cc<3)
{
echo "<br /><br /><br />";
echo "<font style='color:red;font-size:24px'>POOR PERFORMANCE</font>";
}
if($cc>3 && $cc<10)
{
echo "<br /><br /><br />";
echo "<font style='color:blue;font-size:24px'>MODERATE PERFORMANCE KEEP IT UP!</font>";
}
else
{
echo "<br /><br /><br />";
echo "<font style='color:green;font-size:24px'>TREMENDOS PERFORMANCE JUST WORK HARD TO MAINTAIN IT</font>";
	
}
?>

</table>   