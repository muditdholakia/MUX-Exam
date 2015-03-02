<?php
include("profileheader.php");
?>
	<div id="page">
	<table>
    <tr height="45px">
    <td rowspan="3" bgcolor="#FFFFFF" width="200px" align="center"><a href="selectexam.php" style="text-decoration:none">SELECT EXAM</a><br /><br /><br /><a href="profile.php?msg1=mylearning" style="text-decoration:none">MY LEARNINGS</a><br /><br /><br /><a href="profile.php?progress=prg" style="text-decoration:none">PROGRESS</a></td><td style="padding-left:100px">*SELECT YOUR EXAM FOR PREPARATION</td>
    </tr>
    <tr height="45px">
    <td style="padding-left:100px">*CHECK YOUR PREVIOUS LEARNINGS AND RECORDS OF GIVEN EXAM</td>
    </tr>
    <tr height="45px">
    <td style="padding-left:100px">*CHECK YOUR MUX USAGE PROGRESS</td>
    </tr>
    </table>
	
    
    <?php
	if(isset($_GET['msg1']) || isset($_POST['searchvalue']))
	{
	include("db_connect.php");
	include("managerecord.php");
	extract($_POST);

	if(isset($_POST['searchby'])){
		$where =  "where user='".$_SESSION['un']."' and $searchby like '%".$searchvalue."%'";
	echo $sql = "select * from exam_status ".$where;
	
	$result = mysql_query($sql);
	include("outputmanagerecord.php");
	}
}

	?>
    <?php
	if(isset($_GET['progress']))
	{
		echo "<br /><br />";
	include("db_connect.php");
	extract($_POST);
		$where =  "where user='".$_SESSION['un']."'";
	echo $sql = "select * from exam_status ".$where;
	
	$result = mysql_query($sql);
	include("outputmanagerecord2.php");
	}

	?>
    </div>
	<?php
	include_once("footer.php");
	?>