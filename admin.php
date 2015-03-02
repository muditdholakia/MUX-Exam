<?php 
session_start();
		if(!isset($_SESSION['ua']))
		{
			header("location:error.php");	
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="default.css" type="text/css" rel="stylesheet" />
<script src="script.js" type="text/javascript"></script>
<title>Untitled Document</title>
<div id="wrapper" >
	<div id="header">
		<div id="logo">
			<h1><font style="font-size:38px" color="white">MUX</font></h1>
			<p>FOR THOSE WHO LEARN</p>
		</div>
		<div id="menu">
        	<ul>
				<li><a href="signout.php" accesskey="2" title="">Sign out</a></li>
			</ul><br />
			<p align="right" style="font-family:&quot;Arial Black&quot;, Gadget, sans-serif;color:#FFF;font-size:24px">Welcome ADMIN</p><span></span>
		</div>
	</div>
	<div id="page" >
	<table>
    <tr height="45px" bgcolor="#FF9966"><td></td><td></td><td></td>
    <td style="border-radius:10px">
    <a href="admin.php?msg1=manageuser"  style="text-decoration:none">MANAGE USER</a><td></td></td><td></td><td></td><td style="border-radius:10px"><a href="admin.php?msg2=manageexam" style="text-decoration:none">MANAGE EXAM DATABASE</a></td><td></td><td></td><td></td><td style="border-radius:10px"><a href="admin.php?msg3=deleteimage" style="text-decoration:none">DELETE IMAGE</a></td><td></td><td></td><td></td>
    </tr>
    </table>
	</div>
    <div id="page">
    <?php
		if(isset($_GET['sms']))
		{
			echo $_GET['sms'];
		}
	?>
    <?php
	if(isset($_GET['msg1']) || isset($_POST['searchvalue']))
	{
	include("db_connect.php");
	include("manageuser.php");
	extract($_POST);

	if(isset($_POST['searchby'])){
		$where =  "where $searchby like '%".$searchvalue."%'";
	echo $sql = "select * from user_detail ".$where;
	
	$result = mysql_query($sql);
	include("outputmanage.php");
	}
}
	

	?>
     <?php
	if(isset($_GET['msg2']) || isset($_POST['searchvalue1']))
	{
	include("db_connect.php");
	include("manageexam.php");
	extract($_POST);

	if(isset($_POST['searchby1'])){
		$where =  "where $searchby1 like '%".$searchvalue1."%'";
	echo $sql = "select * from exam_data ".$where;
	
	$result = mysql_query($sql);
	include("outputmanageexam.php");
	}
}
	

	?>
    <?php
	extract($_GET);
	if(isset($_GET['msg3']) || isset($_GET['delimg']))
	{
		echo '<form action="admin.php" method="get" name="imgdel">
		<lable>DELETE IMAGE FROM QUESTION NUMBER</label>
		<input type="text" name="delimg" /><input type="submit" value="DELETE" />
		</form>';
		include("db_connect.php");
		if(isset($_GET['delimg']))
		{
			$sq1="SELECT im_src FROM exam_data where ex_sr_no=".$_GET['delimg'];
			$res=mysql_query($sq1);
			$rx=mysql_fetch_array($res);
			if($rx[0]!=NULL)
			{
				unlink($rx[0]);
				$sql = "update exam_data set im_src='".NULL."' where ex_sr_no=".$_GET['delimg'];
				mysql_query($sql);
				header("location: admin.php?sms=QUESTION IMAGE Successfully Deleted");	
			}
			else
			{
				header("location: admin.php?sms=THIS QUESTION HAS NO IMAGE!!");		
			}
				
		}
		
	}
	?>
	</div>    
	<?php
	include_once("footer.php");
	?>