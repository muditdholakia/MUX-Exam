<?php
include("db_connect.php");
extract($_POST);
$i=0;
$msg[16]=0;
$count=0;
$cont=0;
$u=mysql_query("SELECT user_name FROM user_detail where user_name='".$uname."'");
while($row = mysql_fetch_array($u))
{
	$cont=$cont+1;
}
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
if($cont>0)
{
$msg[3]="USERNAME EXISTS!!TRY ANOTHER.";
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
$send;
if($count>0 || cont>0)
{
	for($i=0;$i<16;$i++)
	{
		$send=$send."msg".$i."=".$msg[$i]."&";		
	}
header("location:register.php?$send");	
}


else
{
$sql="INSERT INTO user_detail (sr_no,f_name,l_name,college,user_name,password,birth_date,gender,email_id,mob_no,country,state,city) VALUES (NULL,'".$fname."' ,'".$lname."','".$college."','".$uname."','".$password."','".$byear."".$bmonth."".$bday."','".$gender1."','".$email."','".$mobileno."','".$country."','".$state."','".$city."')";

mysql_query($sql);
header("location:register.php?msg=THANKYOU FOR CHOOSING MUX.");
}
?>