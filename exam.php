<?php
session_start();
if(!isset($_SESSION['un']))
{
	header("location:error.php");	
}
include_once("db_connect.php");
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
        	
			
		</div>
	</div>
    <?php
	if(isset($_SESSION['exid']))
	{
		
		if(isset($_SESSION['curr']))
		{
		$cr=$_SESSION['curr'];
		$qr=mysql_query("select * from temp_ex where tmp_sr_no='".$cr."'");
		$re=mysql_fetch_array($qr);
		$hhhh=$re[2];
		$qry=mysql_query("select * from exam_data where ex_sr_no='".$hhhh."'");
		$rj=mysql_fetch_array($qry);
		}
	}
	?>
	<div id="page">
    <label style="font-family:Arial, Helvetica, sans-serif;font-size:18px;color:#000"><?php if(isset($_SESSION['exid'])){echo $re[3];}?></label>
    <form action="" name="fex" id="fm1" method="post">
	<input type="radio" value="a" name="A" id="rr1" onclick="ckrd1()" <?php if($re[4]=="A") echo 'checked';?>/><?php echo $rj[4];?><br /><br />
    <input type="radio" value="b" name="B" id="rr2" onclick="ckrd2()" <?php if($re[4]=="B") echo 'checked';?>/><?php echo $rj[5];?><br /><br />
    <input type="radio" value="c" name="C" id="rr3" onclick="ckrd3()" <?php if($re[4]=="C") echo 'checked';?>/><?php echo $rj[6];?><br /><br />
    <input type="radio" value="d" name="D" id="rr4" onclick="ckrd4()" <?php if($re[4]=="D") echo 'checked';?>/><?php echo $rj[7];?><br /><br />
    <input type="reset" value="RESET" />
    <?php if($_SESSION['qcount']>$_SESSION['min']){echo '<input type="submit" value="BACK" onclick="ac1()"/>';}else {echo ' ';}?>
    <?php if($_SESSION['qcount']<$_SESSION['max']){echo '<input type="submit" value="NEXT" onclick="ac2()"/>';}else {echo ' ';}?>
    <input type="submit" value="SUBMIT" onclick="ac3()"/>
    </form>
    <br />
    <br />
    <table border="1" align="center">
    <tr>
    <tr><td width="400px" height="350px"><img src="<?php echo $rj[10];?>" width="500px" height="500px"/></td></tr>
    </table>
	</div>
    <?php
	include_once("footer.php");
	?>