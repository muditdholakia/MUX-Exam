<?php
session_start();
		if(!isset($_SESSION['ua']) || !isset($_SESSION['un']))
		{
			header("location:error.php");	
		}
?>
<?php
include("db_connect.php");
extract($_POST);
$i=0;
$msg[16]=0;
$count=0;
$cont=0;
$u1=0;
$u=mysql_query("SELECT user_name FROM user_detail where user_name='".$uname."'");
$row = mysql_fetch_array($u);
if(strlen($fname)<3)
{
$msg[0]="MINIMUM 3 CHARACTERS";
$count=$count+1;
}
if(strlen($lname)<3)
{
$msg[1]="MINIMUM 3 CHARACTERS";
$count=$count+1;
}
if(strlen($college)<3)
{
$msg[2]="MINIMUM 3 CHARACTERS";
$count=$count+1;
}
if(strlen($uname)<6)
{
$msg[3]="MINIMUM 6 CHARACTERS";
$count=$count+1;
}
if($uname!=$row[0])
{
$msg[3]="OOWW!!!YOU CAN'T CHANGE USERNAME";
$count=$count+1;
}
if(strlen($password)<6)
{
$msg[4]="MINIMUM 6 CHARACTERS";
$count=$count+1;
}
if($password!=$confirmpassword)
{
$msg[5]="RE-CONFIRM !!!! DOES NOT MATCH ORIGINAL";
$count=$count+1;
}
if($bmonth==00)
{
$msg[6]="INVALID";
$count=$count+1;
}
if($bday==00)
{
$msg[7]="INVALID";
$count=$count+1;
}
if($byear==0)
{
$msg[8]="INVALID";
$count=$count+1;
}

if($gender1=="0")
{
$msg[9]="INVAILD";
$count=$count+1;
}
if(strlen($email)<16)
{
$msg[10]="MINIMUM 6 CHARACTERS";
$count=$count+1;
}
if(stripos($email,"@")>stripos($email,"."))
{
$msg[10]="INVALID";
$count=$count+1;
}

if(strlen($mobileno)<13 || stripos($mobileno,"+")>0)
{
$msg[11]="INVALID";
$count=$count+1;
}
if(strlen($country)<3)
{
$msg[12]="INVALID";
$count=$count+1;
}
if(strlen($state)<3)
{
$msg[13]="INVALID";
$count=$count+1;
}
if(strlen($city)<3)
{
$msg[14]="INVALID";
$count=$count+1;
}
if(!($chh=="yes"))
{
	$msg[15]="YOU MUST AGREE";
	$count=$count+1;
}
$kk=mysql_query("SELECT sr_no FROM user_detail where user_name='".$uname."'");
$rkk = mysql_fetch_array($kk);
$send;
if($count>0)
{
	for($i=0;$i<16;$i++)
	{
		$send=$send."msg".$i."=".$msg[$i]."&";		
	}
header("location:register.php?$send"."srno=$rkk[0]");	
}


else
{
$sql="UPDATE user_detail SET f_name='".$fname."',l_name='".$lname."',college='".$college."',user_name='".$uname."',password='".$password."',birth_date='".$byear."".$bmonth."".$bday."',gender='".$gender1."',email_id='".$email."',mob_no='".$mobileno."',country='".$country."',state='".$state."',city='".$city."' WHERE user_name='".$uname."'";

mysql_query($sql);
header("location:admin.php?sms=USER UPDATED SUCESSFULLY");
}
?>