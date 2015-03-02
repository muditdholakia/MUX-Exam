<?php
include("db_connect.php");
extract($_POST);
$ad="admin";
$pad="passwordadmin";
if($uname==$ad && $password==$pad)
{
		session_start();
		$_SESSION['ua']=$ad;
		header("location:admin.php");	
}
else
{
$count=0;
$sql = mysql_query("SELECT * FROM user_detail where user_name ='$uname'");
if($r = mysql_fetch_array($sql))
{
	$count=$count+1;	
}
else
{
	header("location:login.php?er=INCORRECT USERNAME OR PASSWORD");
}
if($count==1 && $password=="$r[5]")
{
	$up1=strtoupper(substr($r[1],0,1));
	$lr1=substr($r[1],1,strlen($r[1])-1);
	$final1=$up1.$lr1;
	$up2=strtoupper(substr($r[2],0,1));
	$lr2=substr($r[2],1,strlen($r[2])-1);
	$final2=$up2.$lr2;
	session_start();
	$_SESSION['fn']=$final1;
	$_SESSION['ln']=$final2;
	$_SESSION['un']=$r[4];
	$_SESSION['sr']=$r[0];
	header("location:profile.php");	
}
else
{
	header("location:login.php?er=INCORRECT USERNAME OR PASSWORD");
}
}
?>