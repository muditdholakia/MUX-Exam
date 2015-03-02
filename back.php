<?php
session_start();
include("db_connect.php");
echo $_SESSION['curr'];
echo $_SESSION['qcount'];
extract($_POST);
if($A=="a")
{
		mysql_query("update temp_ex set temp_ans='".strtoupper($A)."' where tmp_sr_no='".$_SESSION['curr']."'");
}
if($B=="b")
{
		mysql_query("update temp_ex set temp_ans='".strtoupper($B)."' where tmp_sr_no='".$_SESSION['curr']."'");
}
if($C=="c")
{
		mysql_query("update temp_ex set temp_ans='".strtoupper($C)."' where tmp_sr_no='".$_SESSION['curr']."'");
}
if($D=="d")
{
		mysql_query("update temp_ex set temp_ans='".strtoupper($D)."' where tmp_sr_no='".$_SESSION['curr']."'");
}
if($A!="a" && $B!="b" && $C!="c" && $D!="d")
{
		mysql_query("update temp_ex set temp_ans='' where tmp_sr_no='".$_SESSION['curr']."'");
}
$_SESSION['curr']=$_SESSION['curr']-1;
$_SESSION['qcount']=$_SESSION['qcount']-1;
header("location:exam.php");
?>