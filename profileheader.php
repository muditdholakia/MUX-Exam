<?php 
session_start();
if(!isset($_SESSION['un']))
{
	header("location:error.php");	
}
if(isset($_SESSION['exid']))
{
		header("location:exam.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="default.css" type="text/css" rel="stylesheet" />
<script src="script.js" type="text/javascript"></script>
<title>Untitled Document</title>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><font style="font-size:38px" color="white">MUX</font></h1>
			<p>FOR THOSE WHO LEARN</p>
		</div>
		<div id="menu">
        	<ul>
				<li><a href="signout.php" accesskey="2" title="">Sign out</a></li>
			</ul><br />
			<p align="right" style="font-family:&quot;Arial Black&quot;, Gadget, sans-serif;color:#FFF;font-size:24px">Welcome&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:#F96"><?php if(isset($_SESSION['un']))
	echo $_SESSION['fn'];printf("   ");echo $_SESSION['ln'];?></font></p>
		</div>
	</div>