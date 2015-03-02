<?php
mysql_connect("localhost","root","");
$res=mysql_list_dbs();
for($row=0;$row<mysql_num_rows($res);$row++)
{
	echo mysql_tablename($res,$row);
	echo "<br />";
}
?>