<?php
require("db_connect.php");
$sql = "delete from user_detail where sr_no=".$_GET['srno'];
mysql_query($sql);
header("location: admin.php?sms= USER Successfully Deleted");
?>