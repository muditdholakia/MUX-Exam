<?php
		if(!isset($_SESSION['ua']))
		{
			header("location:error.php");	
		}
?>
<table  width="100%">
<tr bgcolor="#CCCCCC">
	<td width="80px">SR_NO</td>
    	<td width="80px">CATEGORY</td>
    		<td width="80px">SUBJECT</td>
        		<td width="80px">QUESTION</td>
            		<td width="80px">ANSWER-1</td>
                		<td width="80px">ANSWER-2</td>
            				<td width="80px">ANSWER-3</td>
                				<td width="80px">ANSWER-4</td>
                            		<td width="80px">CORRECT ANSWER</td>
                                		<td width="80px">QUESTION-WEIGHT</td>
                                    		<td width="80px">IMAGE</td>
                                            	<td>Edit</td>
                									<td>Delete</td>
                            
</tr>
<?php
$h=1;
while($row = mysql_fetch_array($result))
{
$srno = $row[0];
$cat = $row[1];
$sub = $row[2];
$qu = $row[3];
$a1 =$row[4];
$a2 =$row[5];
$a3 =$row[6];
$a4 =$row[7];
$ac =$row[8];
$wt =$row[9];
$imsr=$row[10];
if($h%2!=0)
{
echo "<tr><td width='80px'>$srno</td><td width='80px'>$cat</td><td width='80px'>$sub</td><td width='80px'>$qu</td><td width='80px'>$a1</td><td width='80px'>$a2</td><td width='80px'>$a3</td><td width='80px'>$a4</td><td width='80px' align='center'>$ac</td><td width='80px'>$wt</td><td width='80px'>$imsr</td><td width='80px'><a href='crexam.php?srno=".$srno."'>Edit</a></td><td width='80px'><a href='del_question.php?srno=".$srno."'>Delete</a></td></tr>";
$h=$h+1;
}
else
{
echo "<tr bgcolor='#F96'><td width='80px'>$srno</td><td width='80px'>$cat</td><td width='80px'>$sub</td><td width='80px'>$qu</td><td width='80px'>$a1</td><td width='80px'>$a2</td><td width='80px'>$a3</td><td width='80px'>$a4</td><td width='80px' align='center'>$ac</td><td width='80px'>$wt</td><td width='80px'>$imsr</td><td width='80px'><a href='crexam.php?srno=".$srno."'>Edit</a></td><td width='80px'><a href='del_question.php?srno=".$srno."'>Delete</a></td></tr>";	
$h=$h+1;
}
}
?>

</table>   