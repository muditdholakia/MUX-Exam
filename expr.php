<?php
session_start();
include("db_connect.php");
echo $_SESSION['un'];
$unnn= $_SESSION['un'];
extract($_POST);
$msg[10]=0;
$count=0;
if($ect=="0")
{
	$count=$count+1;
	$msg[0]="INVALID EXAM CATEGORY";
}
if($etp=="0")
{
	$count=$count+1;
	$msg[1]="INVALID EXAM TYPE";
}
if($bbb=="0")
{
	$count=$count+1;
	$msg[2]="INVALID STREME";
}
if($etp=="mockdrill")
{
	if($sb=="0")
	{
	$count=$count+1;
	$msg[3]="INVALID SUBJECT";
	}
	if($qw=="0")
	{
	$count=$count+1;
	$msg[4]="INVALID WEIGHT";
	}
}
$d=date("20ymd");
$send;
if($count>0)
{
	for($i=0;$i<16;$i++)
	{
		$send=$send."msg".$i."=".$msg[$i]."&";		
	}
header("location:selectexam.php?$send");	
}
else
{
	if($etp=="mockdrill")
	{
			$qx=mysql_query("insert into exam_status (ex_status,user,ex_tp,ex_sub,ex_dt) values ('PENDING','".$unnn."','".$etp."','".$sb."','".$d."')");
			$xx=mysql_insert_id();
			echo "<br />";
			echo $xx;
			$q=mysql_query("select * from exam_data where sub_id='".$sb."' and que_marks='".$qw."' order by rand() limit 10");
			while($r=mysql_fetch_array($q))
			{
				echo $r[0];
				echo $r[3];
				echo "<br />";
				$qr=mysql_query("insert into temp_ex (temp_ex_st_no,temp_q,temp_qid) values ('".$xx."','".$r[3]."','".$r[0]."')");
			}
			$qry=mysql_query("select tmp_sr_no from temp_ex where temp_ex_st_no='".$xx."'");
			$qrr=mysql_fetch_array($qry);
			echo $qrr[0];
			echo "<br />";
			$_SESSION['min']=1;
			$_SESSION['max']=10;
			$_SESSION['curr']=$qrr[0];
			$_SESSION['qcount']=1;
			$_SESSION['exid']=$xx;
			header("location:exam.php");
	}
	if($etp=="fullcourse")
	{
			$qx=mysql_query("insert into exam_status (ex_status,user,ex_tp,ex_sub,ex_dt) values ('PENDING','".$unnn."','".$etp."','ALL','".$d."')");
			$xx=mysql_insert_id();
			echo "<br />";
			echo $xx;
			$q11=mysql_query("select * from exam_data where que_marks='1' and sub_id like '%".$bbb."%' or 'gc0' or 'gc1' or 'gc3'  order by rand() limit 10");
			while($r1=mysql_fetch_array($q11))
			{
				echo $r1[0];
				echo $r1[3];
				echo "<br />";
				$qr1=mysql_query("insert into temp_ex (temp_ex_st_no,temp_q,temp_qid) values ('".$xx."','".$r1[3]."','".$r1[0]."')");
			}
			$q22=mysql_query("select * from exam_data where que_marks='2' and sub_id like '%".$bbb."%' or 'gc0' or 'gc1' or 'gc3' order by rand() limit 10");
			while($r2=mysql_fetch_array($q22))
			{
				echo $r2[0];
				echo $r2[3];
				echo "<br />";
				$qr2=mysql_query("insert into temp_ex (temp_ex_st_no,temp_q,temp_qid) values ('".$xx."','".$r2[3]."','".$r2[0]."')");
			}
			$q33=mysql_query("select * from exam_data where que_marks='3' and sub_id like '%".$bbb."%' or 'gc0' or 'gc1' or 'gc3'  order by rand() limit 10");
			while($r3=mysql_fetch_array($q33))
			{
				echo $r3[0];
				echo $r3[3];
				echo "<br />";
				$qr3=mysql_query("insert into temp_ex (temp_ex_st_no,temp_q,temp_qid) values ('".$xx."','".$r3[3]."','".$r3[0]."')");
			}
			$q44=mysql_query("select * from exam_data where que_marks='4' and sub_id like '%".$bbb."%' or 'gc0' or 'gc1' or 'gc3' order by rand() limit 10");
			while($r4=mysql_fetch_array($q44))
			{
				echo $r4[0];
				echo $r4[3];
				echo "<br />";
				$qr4=mysql_query("insert into temp_ex (temp_ex_st_no,temp_q,temp_qid) values ('".$xx."','".$r4[3]."','".$r4[0]."')");
			}
			$qry=mysql_query("select tmp_sr_no from temp_ex where temp_ex_st_no='".$xx."'");
			$qrr=mysql_fetch_array($qry);
			echo $qrr[0];
			echo "<br />";
			$_SESSION['min']=1;
			$_SESSION['max']=40;
			$_SESSION['curr']=$qrr[0];
			$_SESSION['qcount']=1;
			$_SESSION['exid']=$xx;
			header("location:exam.php");
	}
}
?>

