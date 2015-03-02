<?php
session_start();
		if(!isset($_SESSION['ua']))
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
$qs=strtoupper($qs);
$u=mysql_query("SELECT que_string FROM exam_data where que_string='".$qs."'");
$row = mysql_fetch_array($u);
echo "$qs";
echo "$row[0]";
if($categr=="0")
{
$msg[0]="SELECT VALID CATEGORY";
$count=$count+1;
}
if(!isset($_POST['strm']))
{
	$msg[1]="INVALID STREME";
	$count=$count+1;	
}
if(!isset($_POST['brsub']))
{
	$msg[2]="INVALID SUBJECT";
	$count=$count+1;	
}
if(isset($_POST['strm']))
{
	if($strm=="0")
	{
	$msg[1]="INVALID STREME";
	$count=$count+1;	
	}
}
if(isset($_POST['brsub']))
{
	if($brsub=="0")
	{
	$msg[2]="INVALID SUBJECT";
	$count=$count+1;	
	}
}
if(strlen($qs)<6 || strlen($qs)>239 )
{
	$msg[3]="INVALID QUESTION";
	$count=$count+1;	
}
if($qs!=$row[0])
{
$msg[3]="OOWW!!!YOU CAN'T CHANGE QUESTION";
$count=$count+1;
}
if(strlen($aa1)<6 || strlen($aa1)>239)
{
	$msg[4]="INVALID ANSWER ENTRY";
	$count=$count+1;	
}
if(strlen($aa2)<6 || strlen($aa2)>239)
{
	$msg[5]="INVALID ANSWER ENTRY";
	$count=$count+1;	
}
if(strlen($aa3)<6 || strlen($aa3)>239)
{
	$msg[6]="INVALID ANSWER ENTRY";
	$count=$count+1;	
}
if(strlen($aa4)<6 || strlen($aa4)>239)
{
	$msg[7]="INVALID ANSWER ENTRY";
	$count=$count+1;	
}
if($cran=="0")
{
	$msg[8]="INVALID CORRECT ANSWER ENTRY";
	$count=$count+1;	
}
if(!isset($_POST['brwt']))
{
	$msg[9]="INVALID WEIGHT";
	$count=$count+1;	
}
if(isset($_POST['brwt']))
{
	if($brwt=="0")
	{
	$msg[9]="INVALID WEIGHT";
	$count=$count+1;	
	}
}
if($ckim=="0")
{
	$msg[10]="OPPSSS!!!";
	$count=$count+1;	
}

if($ckim=="no")
{
	$store=NULL;	
}
echo "$store";
echo "$categr";
echo "$brsub";
echo "$qs";
echo "$aa1";
echo "$aa2";
echo "$aa3";
echo "$aa4";
echo "$cran";
echo "$brwt";
$kk=mysql_query("SELECT ex_sr_no FROM exam_data where que_string='".$qs."'");
$rkk = mysql_fetch_array($kk);
$send;
if($count>0 || $cont>0)
{
	for($i=0;$i<16;$i++)
	{
		$send=$send."msg".$i."=".$msg[$i]."&";		
	}
header("location:crexam.php?$send"."srno=$rkk[0]");	
}
else
{

$sql="UPDATE exam_data SET cat_name='".$categr."',sub_id='".$brsub."',que_string='".$qs."',ans_1='".strtoupper($aa1)."',ans_2='".strtoupper($aa2)."',ans_3='".strtoupper($aa3)."',ans_4='".strtoupper($aa4)."',c_ans='".$cran."',que_marks='".$brwt."' WHERE que_string='".$qs."'";

mysql_query($sql);
$sq1="SELECT im_src FROM exam_data where que_string='".$qs."'";
$res=mysql_query($sq1);
$rx=mysql_fetch_array($res);
unlink($rx[0]);
$sq="SELECT ex_sr_no FROM exam_data where que_string='".$qs."'";
$res=mysql_query($sq);
$r=mysql_fetch_array($res);
if($ckim=="yes")
{
	
$allowedExts = array("gif", "jpeg", "jpg", "png");
$fname = $_FILES["file"]["name"];
$ext = explode(".", $fname);
echo $extension = $ext[1];
print_r($_FILES["file"]);

if (
	(
	 ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 200000000)
&& in_array($extension, $allowedExts)
)
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	$count=$count+1;
	$msg[10]="ERROR";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

   		$_FILES["file"]["name"]="$r[0]"."."."$ext[1]";
      move_uploaded_file($_FILES["file"]["tmp_name"],"images/". $_FILES["file"]["name"]);
      echo "Stored in: " . "images/" . $_FILES["file"]["name"];
	  $store="images/" . $_FILES["file"]["name"];
     
    }
  }
else
  {
  echo "Invalid file";
  }
}
$sl="UPDATE exam_data SET im_src='".$store."' WHERE que_string='".$qs."'";
mysql_query($sl);
header("location:admin.php?sms=UPDATED SUCESSFULLY");

}
?>