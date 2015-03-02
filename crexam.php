<?php
session_start();
		if(!isset($_SESSION['ua']))
		{
			header("location:error.php");	
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="default.css" type="text/css" rel="stylesheet" />
<script src="script.js" type="text/javascript"></script>
<title>Untitled Document</title>
<div id="wrapper" >
	<div id="header">
		<div id="logo">
			<h1><font style="font-size:38px" color="white">MUX</font></h1>
			<p>FOR THOSE WHO LEARN</p>
		</div>
		<div id="menu">
        	<ul>
				<li><a href="signout.php" accesskey="2" title="">Sign out</a></li>
			</ul><br />
			<p align="right" style="font-family:&quot;Arial Black&quot;, Gadget, sans-serif;color:#FFF;font-size:24px">Welcome ADMIN</p><span></span>
		</div>
	</div>
	<div id="page" >
	<table>
    <tr height="45px" bgcolor="#FF9966"><td></td><td></td><td></td>
    <td style="border-radius:10px">
    <a href="admin.php?msg1=manageuser"  style="text-decoration:none">MANAGE USER</a><td></td></td><td></td><td></td><td style="border-radius:10px"><a href="admin.php?msg2=manageexam" style="text-decoration:none">MANAGE EXAM DATABASE</a></td><td></td><td></td><td></td><td style="border-radius:10px"><a href="admin.php?msg3=deleteimage" style="text-decoration:none">DELETE IMAGE</a></td><td></td><td></td><td></td>
    </tr>
    </table>
	</div>
    <div id="page" >
<?php if(isset($_GET['srno']))
{
	include("db_connect.php"); 
	extract($_GET);
	$sq="select * from exam_data where ex_sr_no='".$srno."'";
	$res=mysql_query($sq);
	$row=mysql_fetch_array($res);
	printf("CATEGORY IS:");printf($row[1]);printf("<br />");
	printf("SUBJECT IS:");printf($row[2]);printf("<br />");
	printf("CORRECT ANSWER IS:");;printf($row[8]);printf("<br />");
	printf("WEIGHT:");printf($row[9]);printf("<br />");
	$ccaatt=$row[1];
	$crct=$row[8];
	$suct=$row[2];
	if($row[10]==NULL)
	{
		printf("IMAGE:");printf("NO IMAGE");
	}
	else
	{
		printf("IMAGE:");printf($row[10]);	
	}
	printf("<br />");printf("HEY!! ADMIN MAKE SURE YOU CHANGE IT MANUALY");
	
}?>
  <br /><br /><br />
	<table bgcolor="#333333" align="center" >
    <tr style="width:600px;height:500px">
    <td class="pdd">
    <br /><p align="center"><font color="#FF9966" size="+2"><?php if(isset($_GET['msg']))
	echo $_GET['msg']; ?></font></p><br /><br /><br />
    <p align="center"><font color="#FF9966" size="+2"><?php if(isset($_GET['srno']))
	{echo 'UPDATE QUESTION';}else{echo 'ENTER QUESTION';}?></font></p><br /><br />
    <form action="<?php if(isset($_GET['srno'])){echo 'updexamprocess.php';}else{echo 'examprocess.php';}?>" method="post" enctype="multipart/form-data" name="fque" >
    <label><font color="#CCCCCC">SELECT EXAM<sup>*</sup>:</font></label><br />
    <select style="width:400px;height:25px" id="ex1" onblur="susel()" name="categr">
    <option value="0"></option>
	<option value="gate"  <?php if(isset($ccaatt)){if($ccaatt=="gate"){ echo 'selected';}}else{ echo '';}?>>GATE</option>
	<option value="cat" <?php if(isset($ccaatt)){if($ccaatt=="cat"){ echo 'selected';}}else{ echo '';}?>>CAT</option>
	</select><br /><span id="catg" style="color:#F96"><?php if(isset($_GET['msg0']))
	echo $_GET['msg0']; ?></span><br />
    
    <br /><br />
    <span id="streme"></span>
    <br />
    <span style="width:60px;height:35px;color:#F96" id="spx"><?php if(isset($_GET['msg1']))
	echo $_GET['msg1']; ?></span><br />
    <span style="width:60px;height:35px" id="sp1"></span><br />
     <span style="width:60px;height:35px;color:#F96" id="spx1"><?php if(isset($_GET['msg2']))
	echo $_GET['msg2']; ?></span>
    <br />
    <label><font color="#CCCCCC">ENTER QUESTION(6-240 characters)<sup>*</sup>:</font></label>
    <br />
   <textarea style="width:400px;height:80px" id="que" onblur="f19()" name="qs"><?php if(isset($_GET['srno'])) printf($row[3]);?></textarea>
    <br />
    <span id="que1" style="color:#F96"><?php if(isset($_GET['msg3']))
	echo $_GET['msg3']; ?></span>
    <br />
    <label><font color="#CCCCCC">ENTER ANSWER1-A(6-240 characters)<sup>*</sup>:</font></label>
    <br />
    <textarea style="width:400px;height:80px" id="a1" onblur="f20()" name="aa1"><?php if(isset($_GET['srno'])) printf($row[4]);?></textarea>
    <br />
    <span id="a11" style="color:#F96"><?php if(isset($_GET['msg4']))
	echo $_GET['msg4']; ?></span>
    <br />
    <label><font color="#CCCCCC">ENTER ANSWER2-B(6-240 characters)<sup>*</sup>:</font></label>
    <br />
    <textarea style="width:400px;height:80px" id="a2" onblur="f21()" name="aa2"><?php if(isset($_GET['srno'])) printf($row[5]);?></textarea>
    <br />
    <span id="a22" style="color:#F96"><?php if(isset($_GET['msg5']))
	echo $_GET['msg5']; ?></span>
    <br />
    <label><font color="#CCCCCC">ENTER ANSWER3-C(6-240 characters)<sup>*</sup>:</font></label>
    <br />
    <textarea style="width:400px;height:80px" id="a3" onblur="f22()" name="aa3"><?php if(isset($_GET['srno'])) printf($row[6]);?></textarea>
    <br />
    <span id="a33" style="color:#F96"><?php if(isset($_GET['msg6']))
	echo $_GET['msg6']; ?></span>
    <br />
    <label><font color="#CCCCCC">ENTER ANSWER4-D(6-240 characters)<sup>*</sup>:</font></label>
    <br />
    <textarea style="width:400px;height:80px" id="a4" onblur="f23()" name="aa4"><?php if(isset($_GET['srno'])) printf($row[7]);?></textarea>
    <br />
    <span id="a44" style="color:#F96"><?php if(isset($_GET['msg7']))
	echo $_GET['msg7']; ?></span>
    <br />
    <label><font color="#CCCCCC">SELECT CORRECT ANSWER<sup>*</sup>:</font></label>
    <br />
    <select style="width:400px;height:25px" id="cans" onchange="ansel()" name="cran">
    <option value="0"></option>
	<option value="A" <?php if(isset($crct)){if($crct=="A"){ echo 'selected';}}else{ echo '';}?>>A</option>
	<option value="B" <?php if(isset($crct)){if($crct=="B"){ echo 'selected';}}else{ echo '';}?>>B</option>
    <option value="C" <?php if(isset($crct)){if($crct=="C"){ echo 'selected';}}else{ echo '';}?>>C</option>
    <option value="D" <?php if(isset($crct)){if($crct=="D"){ echo 'selected';}}else{ echo '';}?>>D</option>
	</select>
    <br /><span style="width:60px;height:35px;color:#F96" id="anx"><?php if(isset($_GET['msg8']))
	echo $_GET['msg8']; ?></span>
    <br />
    <label><font color="#CCCCCC">IMAGE<sup>*</sup>:</font></label>
    <select id="imyn" onchange="incimg()" name="ckim">
    <option value="0"></option>
    <option value="yes">YES</option>
    <option value="no">NO</option>
	</select><br /><span id="imm" style="color:#F96"><?php if(isset($_GET['msg10']))
	echo $_GET['msg10']; ?></span>
    <br /><span style="width:60px;height:35px" id="sp2"></span><br /><span style="width:60px;height:35px;color:#F96" id="spx2"><?php if(isset($_GET['msg9']))
	echo $_GET['msg9']; ?></span><span style="width:60px;height:35px" id="hh"></span><br />					    <br />
    <p align="right"><input type="reset" class="button-style" value="RESET" name="rst"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="button-style" value="<?php if(isset($_GET['srno'])){echo 'UPDATE';}else{echo 'INSERT QUESTION';}?>" name="instqs" /></p>
    </form>
    <br /><p align="left">NOTE:(*)marked fields are compulsory.</p><br />
    </td>
    </tr>
    </table>
    <br /><br />
    </div>
	<?php
	include_once("footer.php");
	?>