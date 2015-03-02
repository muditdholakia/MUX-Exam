<?php
		if(!isset($_SESSION['ua']))
		{
			header("location:error.php");	
		}
?>
	<table width="900px" height="50px" bgcolor="#333333">
    <tr>
    <td>
    <form action="admin.php" method="post">
	<input type="text" name="searchvalue1" style="width:400px;height:19px" />
	<select name="searchby1" style="height:25px">
	<option value="sub_id">SUBJECT WISE</option>
	<option value="cat_id">CATEGORY WISE</option>
	<option value="que_string">QUESTION WISE</option>
	<option value="ans_1">ANSWER-1</option>
	<option value="ans_2">ANSWER-2</option>
    <option value="ans_3">ANSWER-3</option>
    <option value="ans_4">ANSWER-4</option>
    <option value="c_ans">CORRECT-ANSWER</option>
    <option value="que_marks">QUESTION WEIGHTAGE</option>
	</select>
	<input type="submit" value="GO" style="height:25px;background-color:#F96;color:#FFFFFF;border-color:#F96" />
    <input type="Reset" value="Cancel" style="height:25px;background-color:#F96;color:#FFFFFF;border-color:#F96"/>
    <a href="crexam.php" style="text-decoration:overline;font-size:14px;color:#FFF">ADD-QUESTION</a>
	</form></td></tr></table><br /><br /><br />