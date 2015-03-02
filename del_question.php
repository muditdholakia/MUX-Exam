<?php
require("db_connect.php");
$sq1="SELECT im_src FROM exam_data where ex_sr_no=".$_GET['srno'];
$res=mysql_query($sq1);
$rx=mysql_fetch_array($res);
if($rx[0]!=NULL)
{
unlink($rx[0]);
$sql = "delete from exam_data where ex_sr_no=".$_GET['srno'];
mysql_query($sql);
}
else
{
$sql = "delete from exam_data where ex_sr_no=".$_GET['srno'];
mysql_query($sql);	
}
header("location: admin.php?sms=QUESTION Successfully Deleted");
?>