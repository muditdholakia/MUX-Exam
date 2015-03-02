<?php 
session_start();
if(isset($_SESSION['un']))
{
	header("location:profile.php");	
}
if(isset($_SESSION['ua']) && !isset($_GET['add']) && !isset($_GET['srno']))
{
	header("location:admin.php");	
}
?>
<?php
if(isset($_SESSION['ua']))
{
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="default.css" type="text/css" rel="stylesheet" />
<script src="script.js" type="text/javascript"></script>
<title>Untitled Document</title>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">MUX</a></h1>
			<p>FOR THOSE WHO LEARN</p>
		</div>
		<div id="menu">
			<ul>
				<li><a href="signout.php" accesskey="4" title="">Sign out</a></li>
			</ul>
		</div>
	</div>';}
	else
	{
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="default.css" type="text/css" rel="stylesheet" />
<script src="script.js" type="text/javascript"></script>
<title>Untitled Document</title>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">MUX</a></h1>
			<p>FOR THOSE WHO LEARN</p>
		</div>
		<div id="menu">
			<ul>
				<li><a href="home.php" accesskey="1" title="">Home</a></li>
				<li><a href="register.php" accesskey="2" title="">Register</a></li>
				<li><a href="aboutus.php" accesskey="3" title="">About Us</a></li>
				<li><a href="login.php" accesskey="4" title="">Sign in</a></li>
				<li><a href="#" accesskey="5" title="">Help & Support</a></li>
			</ul>
		</div>
	</div>';
	}
?>
