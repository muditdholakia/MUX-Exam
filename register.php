<?php
include_once("header.php");
?>
<?php if(isset($_GET['srno']))
{
	include("db_connect.php"); 
	extract($_GET);
	$sq="select * from user_detail where sr_no='".$srno."'";
	$res=mysql_query($sq);
	$row=mysql_fetch_array($res);
	printf($row[4]);
	printf("Birthdate is");printf(substr($row[6],0,4));printf("/");printf(substr($row[6],4,2));printf("/");printf(substr($row[6],6,2));printf("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");printf("MAKE SURE YOU CHANGE IT MANUALY");
	$yr=substr($row[6],0,4);$mth=substr($row[6],4,2);$da=substr($row[6],6,2);
}?>
<br /><br /><br /><br />
	<table bgcolor="#333333" align="center">
    <tr style="width:600px;height:700px">
    <td class="pdd">
    <br /><p align="center"><font color="#FF9966" size="+2"><?php if(isset($_GET['msg']))
	echo $_GET['msg']; ?></font></p><br />
    <p align="center"><font color="#FF9966" size="+2"><?php if(isset($_GET['srno']) || isset($_GET['add']))
	{echo 'ADMIN&acute;s UPDATION/EDITION FORM';}else{echo 'REGISTRATION FORM';}?></font></p><br /><br />
    <form action="<?php if(isset($_GET['srno'])){echo 'updprocess.php';}else{echo 'regprocess.php';}?>" method="post" name="registerform">
    <label><font color="#CCCCCC">FIRST NAME<sup>*</sup>:</font></label><br />
    <input type="text" style="width:400px;height:25px" name="fname" id="fnm" onBlur="f2()" value="<?php if(isset($_GET['srno'])) printf($row[1]);?>"/><br /><span id="fn" style="color:#F96"></span><span  id="fn1" style="color:#F96"><?php if(isset($_GET['msg0']))
	echo $_GET['msg0']; ?></span><br />
    <label><font color="#CCCCCC">LAST NAME<sup>*</sup>:</font></label><br />
    <input type="text" style="width:400px;height:25px" name="lname" id="lnm" onBlur="f3()" value="<?php if(isset($_GET['srno'])) printf($row[2]);?>"/><br /><span id="ln" style="color:#F96"></span><span id="ln1" style="color:#F96"><?php if(isset($_GET['msg1']))
	echo $_GET['msg1']; ?></span><br />
    <label><font color="#CCCCCC">COLLEGE<sup>*</sup>:</font></label><br />
    <input type="text" style="width:400px;height:25px" name="college" id="clg" onBlur="f4()" value="<?php if(isset($_GET['srno'])) printf($row[3]);?>"/><br /><span id="cg" style="color:#F96"></span><span id="cg1" style="color:#F96"><?php if(isset($_GET['msg2']))
	echo $_GET['msg2']; ?></span><br />
    <label><font color="#CCCCCC">USERNAME<sup>*</sup>:</font></label><br />
    <input type="text" style="width:400px;height:25px" name="uname" id="unm" onBlur="f5()" value="<?php if(isset($_GET['srno'])) printf($row[4]);?>"/><br /><span id="un" style="color:#F96"></span><span id="un1" style="color:#F96"><?php if(isset($_GET['msg3']))
	echo $_GET['msg3']; ?></span><br />
    <label><font color="#CCCCCC">PASSWORD<sup>*</sup>:</font></label><br />
    <input type="password" style="width:400px;height:25px" name="password" id="pswd" onBlur="f6()" value="<?php if(isset($_GET['srno'])) printf($row[5]);?>"/><br /><span id="psw" style="color:#F96"></span><span id="psw1" style="color:#F96"><?php if(isset($_GET['msg4']))
	echo $_GET['msg4']; ?></span><br />
    <label><font color="#CCCCCC">CONFIRM PASWORD<sup>*</sup>:</font></label><br />
    <input type="password" style="width:400px;height:25px" name="confirmpassword" id="cnfpswd" onBlur="f7()" value="<?php if(isset($_GET['srno'])) printf($row[5]);?>"/><br /><span id="cnfpsw" style="color:#F96"></span><span id="cnfpswd1" style="color:#F96"><?php if(isset($_GET['msg5']))
	echo $_GET['msg5']; ?></span><br />
    <label><font color="#CCCCCC">BIRTHDAY<sup>*</sup>:</font></label>
	<select style="width:100px;height:25px" name="bmonth" id="month" onBlur="monthsel()" onChange="f8()">
    <option value="0"></option>
	<option value="01" <?php if(isset($mth)){if($mth=="01"){ echo 'selected';}} else{ echo '';}?>>January</option>
	<option value="02" <?php if(isset($mth)){if($mth=="02"){ echo 'selected';}} else{ echo '';}?>>February</option>
	<option value="03" <?php if(isset($mth)){if($mth=="03"){ echo 'selected';}} else{ echo '';}?>>March</option>
	<option value="04" <?php if(isset($mth)){if($mth=="04"){ echo 'selected';}} else{ echo '';}?>>April</option>
	<option value="05" <?php if(isset($mth)){if($mth=="05"){ echo 'selected';}} else{ echo '';}?>>May</option>
	<option value="06" <?php if(isset($mth)){if($mth=="06"){ echo 'selected';}} else{ echo '';}?>>June</option>
	<option value="07" <?php if(isset($mth)){if($mth=="07"){ echo 'selected';}} else{ echo '';}?>>July</option>
	<option value="08" <?php if(isset($mth)){if($mth=="08"){ echo 'selected';}} else{ echo '';}?>>August</option>
	<option value="09" <?php if(isset($mth)){if($mth=="09"){ echo 'selected';}} else{ echo '';}?>>September</option>
	<option value="10" <?php if(isset($mth)){if($mth=="10"){ echo 'selected';}} else{ echo '';}?>>October</option>
	<option value="11" <?php if(isset($mth)){if($mth=="11"){ echo 'selected';}} else{ echo '';}?>>November</option>
	<option value="12" <?php if(isset($mth)){if($mth=="12"){ echo 'selected';}} else{ echo '';}?>>December</option>
	</select>&nbsp;
	<span id="datt"></span>
    <select style="width:100px;height:25px" name="byear" id="year"  onblur="monthsel()" onChange="f10()">
    <option value="0"></option>
	<option value="1972" <?php if(isset($yr)){if($yr=="1972"){ echo 'selected';}}else{ echo '';}?>>1972</option>
	<option value="1973" <?php if(isset($yr)){if($yr=="1973"){ echo 'selected';}}else{ echo '';}?>>1973</option>
	<option value="1974" <?php if(isset($yr)){if($yr=="1974"){ echo 'selected';}}else{ echo '';}?>>1974</option>
	<option value="1975" <?php if(isset($yr)){if($yr=="1975"){ echo 'selected';}}else{ echo '';}?>>1975</option>
	<option value="1976" <?php if(isset($yr)){if($yr=="1976"){ echo 'selected';}}else{ echo '';}?>>1976</option>
	<option value="1977" <?php if(isset($yr)){if($yr=="1977"){ echo 'selected';}}else{ echo '';}?>>1977</option>
	<option value="1978" <?php if(isset($yr)){if($yr=="1978"){ echo 'selected';}}else{ echo '';}?>>1978</option>
	<option value="1979" <?php if(isset($yr)){if($yr=="1979"){ echo 'selected';}}else{ echo '';}?>>1979</option>
	<option value="1980" <?php if(isset($yr)){if($yr=="1980"){ echo 'selected';}}else{ echo '';}?>>1980</option>
	<option value="1982" <?php if(isset($yr)){if($yr=="1981"){ echo 'selected';}}else{ echo '';}?>>1981</option>
	<option value="1982" <?php if(isset($yr)){if($yr=="1982"){ echo 'selected';}}else{ echo '';}?>>1982</option>
	<option value="1983" <?php if(isset($yr)){if($yr=="1983"){ echo 'selected';}}else{ echo '';}?>>1983</option>
	<option value="1984" <?php if(isset($yr)){if($yr=="1984"){ echo 'selected';}}else{ echo '';}?>>1984</option>
	<option value="1985" <?php if(isset($yr)){if($yr=="1985"){ echo 'selected';}}else{ echo '';}?>>1985</option>
	<option value="1986" <?php if(isset($yr)){if($yr=="1986"){ echo 'selected';}}else{ echo '';}?>>1986</option>
	<option value="1987" <?php if(isset($yr)){if($yr=="1987"){ echo 'selected';}}else{ echo '';}?>>1987</option>
	<option value="1988" <?php if(isset($yr)){if($yr=="1988"){ echo 'selected';}}else{ echo '';}?>>1988</option>
	<option value="1989" <?php if(isset($yr)){if($yr=="1989"){ echo 'selected';}}else{ echo '';}?>>1989</option>
	<option value="1990" <?php if(isset($yr)){if($yr=="1990"){ echo 'selected';}}else{ echo '';}?>>1990</option>
	<option value="1991" <?php if(isset($yr)){if($yr=="1991"){ echo 'selected';}}else{ echo '';}?>>1991</option>
	<option value="1992" <?php if(isset($yr)){if($yr=="1992"){ echo 'selected';}}else{ echo '';}?>>1992</option>
	<option value="1993" <?php if(isset($yr)){if($yr=="1993"){ echo 'selected';}}else{ echo '';}?>>1993</option>
	<option value="1994" <?php if(isset($yr)){if($yr=="1994"){ echo 'selected';}}else{ echo '';}?>>1994</option>
	<option value="1995" <?php if(isset($yr)){if($yr=="1995"){ echo 'selected';}}else{ echo '';}?>>1995</option>
	</select>
    <br /><span id="bmn" style="color:#F96"></span><span id="bmn1" style="color:#F96"><?php if(isset($_GET['msg6']))
	echo $_GET['msg6']; ?></span><span id="bdt" style="color:#F96"></span><span id="bdt1" style="color:#F96"><?php if(isset($_GET['msg7']))
	echo $_GET['msg7']; ?></span><span id="byr" style="color:#F96"></span><span id="byr1" style="color:#F96"><?php if(isset($_GET['msg8']))
	echo $_GET['msg8']; ?></span><br />
    <label><font color="#CCCCCC">GENDER<sup>*</sup>&nbsp;&nbsp;:</font></label>
	<select style="width:100px;height:25px" name="gender1" id="gen" onBlur="f11()">
	<option value="0"></option>
    <option value="male">Male</option>
	<option value="female">Female</option>
	</select><br /><span id="gndr" style="color:#F96"></span><span id="gndr1" style="color:#F96"><?php if(isset($_GET['msg9']))
	echo $_GET['msg9']; ?></span><br />
    <label><font color="#CCCCCC">EMAIL<sup>*</sup>:</font></label><br />
    <input type="text" style="width:400px;height:25px" name="email" id="eid" onBlur="f12()" value="<?php if(isset($_GET['srno'])) printf($row[8]);?>"/><br /><span id="mail" style="color:#F96"></span><span id="mail1" style="color:#F96"><?php if(isset($_GET['msg10']))
	echo $_GET['msg10']; ?></span><br />
    <label><font color="#CCCCCC">MOBILE NUMBER<sup>*</sup>:</font></label><br />
    <input type="text" style="width:400px;height:25px" name="mobileno" id="mob" onBlur="f13()" value="<?php if(isset($_GET['srno'])) printf($row[9]);?>"/><br /><span id="mno" style="color:#F96"></span><span id="mno1" style="color:#F96"><?php if(isset($_GET['msg11']))
	echo $_GET['msg11']; ?></span><br />
    <label><font color="#CCCCCC">COUNTRY<sup>*</sup>:</font></label><br />
    <input type="text" style="width:400px;height:25px" name="country" id="con" onBlur="f14()" value="<?php if(isset($_GET['srno'])) printf($row[10]);?>"/><br /><span id="ctry" style="color:#F96"></span><span id="ctry1" style="color:#F96"><?php if(isset($_GET['msg12']))
	echo $_GET['msg12']; ?></span><br />
    <label><font color="#CCCCCC">STATE<sup>*</sup>:</font></label><br />
    <input type="text" style="width:400px;height:25px" name="state" id="st" onBlur="f15()" value="<?php if(isset($_GET['srno'])) printf($row[11]);?>"/><br /><span id="stt" style="color:#F96"></span><span id="stt1" style="color:#F96"><?php if(isset($_GET['msg13']))
	echo $_GET['msg13']; ?></span><br />
    <label><font color="#CCCCCC">CITY<sup>*</sup>:</font></label><br />
    <input type="text" style="width:400px;height:25px" name="city" id="ct"  onblur="f16()" value="<?php if(isset($_GET['srno'])) printf($row[12]);?>"/><br /><span id="cty" style="color:#F96"></span><span id="cty1" style="color:#F96"><?php if(isset($_GET['msg14']))
	echo $_GET['msg14']; ?></span><br />
    <p align="center"><input type="checkbox" name="chh" value="yes"/><font color="#CCCCCC" id="chk1">  I agree to MUX <a href="#" style="color:#F96;text-decoration:none" >TERMS AND CONDITIONS</a> and <a href="#" style="color:#F96;text-decoration:none">PRIVACY POLICY</a></font></p><br /><span id="ck" style="color:#F96"></span><span id="ck1" style="color:#F96"><?php if(isset($_GET['msg15']))
	echo $_GET['msg15']; ?></span><br />
    <p align="right"><input type="reset" class="button-style" value="RESET" name="reset"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="button-style" value="<?php if(isset($_GET['srno'])){echo 'UPDATE';}else if(isset($_GET['add'])){ echo 'ADD USER';}else{echo 'SUBMIT';}?>" name="submit1"/></p>
    </form>
    <br /><p align="left">NOTE:(*)marked fields are compulsory.</p><br />
    </td>
    </tr>
    </table>
    <br /><br />
<?php
include_once("footer.php");
?>