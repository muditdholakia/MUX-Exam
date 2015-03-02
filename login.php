<?php
include_once("header.php");
?> 
  <br /><br /><br /><br />
	<table bgcolor="#333333" align="center">
    <tr style="width:600px;height:200px">
    <td class="pdd">
    <br /><br />
    <p align="left"><font color="#FF9966" size="+2">SIGN IN</font></p><br /><font style="color:#F96;font-size:12px"><?php extract($_GET); if(isset($_GET['er'])) printf("$er");?></font><br />
    <form action="loginprocess.php" method="post" name="flog">
    <label><font color="#CCCCCC">USERNAME<sup>*</sup>:</font></label><br />
    <input type="text" style="width:400px;height:25px" name="uname"/><br /><br />
    <label><font color="#CCCCCC">PASSWORD<sup>*</sup>:</font></label><br />
    <input type="password" style="width:400px;height:25px" name="password"/><br /><br />
    <p align="right"><input type="submit" class="button-style" value="Sign in" /></p> 
    </form>
    <br /><p align="left">NOTE:(*)marked fields are compulsory.</p><br />
    </td>
    </tr>
    </table>
    <br /><br />
<?php	
include_once("footer.php");	
?>
