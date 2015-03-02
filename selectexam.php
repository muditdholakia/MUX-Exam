<?php
include("profileheader.php");
?>
  <br /><br /><br /><br />
	<table bgcolor="#333333" align="center" >
    <tr style="width:600px;height:500px">
    <td class="pdd">
    <br /><br />
    <p align="center"><font color="#FF9966" size="+2">SELECT YOUR EXAM</font></p><br /><br />
    <form action="expr.php" method="post">
    <label><font color="#CCCCCC">SELECT EXAM<sup>*</sup>:</font></label><br />
    <select style="width:400px;height:25px" id="excat" onblur="subsel()" name="ect" onchange="cct()">
    <option value="0"></option>
	<option value="gate">GATE</option>
	<option value="cat">CAT</option>
	</select><br /><span id="cct1" style="color:#F96"><?php if(isset($_GET['msg0'])){echo $_GET['msg0'];}?></span><br /><span id="exc"></span><br />
    <label><font color="#CCCCCC">SELECT TEST TYPE<sup>*</sup>:</font></label><br />
	<select style="width:400px;height:25px" id="schcat" onchange="f1()" name="etp" onblur="ccd()">
    <option value="0"></option>
	<option value="mockdrill">MOCK DRILL</option>
	<option value="fullcourse">FULL COURSE</option>
	</select>
    <br /><span id="ccd1" style="color:#F96"><?php if(isset($_GET['msg1'])){echo $_GET['msg1'];}?></span><br />
    <span id="sub"></span><br /><span id='ctc1' style='color:#F96'><?php if(isset($_GET['msg2'])){echo $_GET['msg2'];}?></span><br /><span style="width:60px;height:35px" id="sp1"></span><br /><span id='xcd1' style='color:#F96'><?php if(isset($_GET['msg3'])){echo $_GET['msg3'];}?></span><br /><span style="width:60px;height:35px" id="sp2"></span><br /><span id='xc1' style='color:#F96'><?php if(isset($_GET['msg4'])){echo $_GET['msg4'];}?></span><br /><span style="width:60px;height:35px"></span><br /><br />
    <p align="right"><input type="reset" class="button-style" value="RESET" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="button-style" value="GO FOR TEST" /></p>
    </form>
    <br /><p align="left">NOTE:(*)marked fields are compulsory.</p><br />
    </td>
    </tr>
    </table>
    <br /><br />
	<?php
	include_once("footer.php");
	?>