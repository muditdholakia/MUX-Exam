<?php
session_start();
echo $_SESSION['exid'];
include("db_connect.php");
extract($_POST);
$totalmarks=0;
$attempt=0;
$discard=0;
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

$fr_exst=mysql_query("select * from temp_ex where temp_ex_st_no='".$_SESSION['exid']."'");
while($r=mysql_fetch_array($fr_exst))
{
						$fr_std=mysql_query("select * from exam_data where ex_sr_no='".$r[2]."'");
						$rx=mysql_fetch_array($fr_std);
						if($r[4]=='')
						{
								$totalmarks=$totalmarks;				
								$discard=$discard+1;
						}
						if($r[4]!='')
						{
							if($r[4]==$rx[8])
							{
								$totalmarks=$totalmarks+$rx[9];
								$attempt=$attempt+1;
							}
							if($r[4]!=$rx[8])
							{
								$totalmarks=$totalmarks;
								$attempt=$attempt+1;
							}
						}
}
printf($attempt);
printf($totalmarks);
mysql_query("update exam_status set q_atmpt='".$attempt."',q_discard='".$discard."',obtained='".$totalmarks."',ex_status='COMPLETED' where ex_st_no='".$_SESSION['exid']."'");
mysql_query("delete from temp_ex where temp_ex_st_no='".$_SESSION['exid']."'");
unset($_SESSION['exid']);
header("location:profile.php?sms=COMPLETED SUCCESSFULLY");
?>