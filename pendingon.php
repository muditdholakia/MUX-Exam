<?php
session_start();
include("db_connect.php");
extract($_GET);
$hx=$exno;
$q=mysql_query("select tmp_sr_no from temp_ex where temp_ex_st_no='".$hx."'");
$qrr=mysql_fetch_array($q);

if($type=="mockdrill")
{
	echo $qrr[0];
			echo "<br />";
			$_SESSION['min']=1;
			$_SESSION['max']=10;
			$_SESSION['curr']=$qrr[0];
			$_SESSION['qcount']=1;
			$_SESSION['exid']=$hx;
			header("location:exam.php");	
}
if($type=="fullcourse")
{
	echo $qrr[0];
			echo "<br />";
			$_SESSION['min']=1;
			$_SESSION['max']=40;
			$_SESSION['curr']=$qrr[0];
			$_SESSION['qcount']=1;
			$_SESSION['exid']=$hx;
			header("location:exam.php");

}
?>