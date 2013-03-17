<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form

 	include( "header.php");
 ?>

<tr>
<td style="background-color:white;width:300px;vertical-align:middle;">
	<?php
 	include( "navigationd.php");
 	$con = mysql_connect("localhost","root");
 	if (!$con)
 	{
 		die('Could not connect: ' . mysql_error());
 	}
 	
 	mysql_select_db("prijal_healthmd", $con);
 //	$account_id=$_SESSION['account_id'];
 	$account_id=$_SESSION['staff_account_id'];
 	$result = mysql_query("SELECT spclty_type_cd,last_name,first_name,email_address,work_phone,cell_phone FROM  org_staff WHERE account_id = '$account_id'");
 	$row = mysql_fetch_assoc($result);
 	$specialties = $row['spclty_type_cd'];
 	$lastname = $row['last_name'];
 	$firstname =  $row['first_name'];
 	//$gender= $row['gender'];
 	$email= $row['email_address'];
 	$work=$row['work_phone'];
 	$cell=$row['cell_phone'];

 	
 ?>
</td>
<td style="background-color:white;width:900px;text-align:top;">
<table style="margin:40px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td>

<table class="header" style="width:100%">
<tr><td >

Doctor Profile Information

</td></tr>
</table>
</td>
</tr>
<tr><td>
<input type="hidden" name="account_id" value="<?php echo $_REQUEST['account_id'];?>"/>
<table class="main" style="width:100%">
<tr>
<td colspan="4" style="width:100%">

Organization/Practice:
<?php
$con = mysql_connect("localhost","root");
mysql_select_db("prijal_healthmd", $con);
$q1=mysql_query("SELECT org_name FROM organization");
?>
<select name="org_name">
<?php
while($row=mysql_fetch_array($q1))
{
?>
<option value="<?php echo $row['org_name'];?>">
<?php
echo $row['org_name'];
?>
</option>
<?php
}
?>
</select>
</td>

 <!--  <td colspan="3" style="width:90%"> <input type="text" name="organization"
size="50" maxlength="50" />
</td>
-->
</tr>
<tr><td style="width:10%">
Last Name:</td><td style="width:40%;"> <input type="text" name="lastname"  value="<?php echo $lastname;?>"
size="35" maxlength="35" />
</td>

<td style="width:10%">
First Name:
</td> <td style="width:40%"><input type="text" name="firstname"  value="<?php echo $firstname;?>"
size="35" maxlength="35"/>
</td>

</tr>

<tr><td style="width:10%">
Middle Name:</td><td style="width:40%;"> <input type="text" name="middlename"
size="35" maxlength="35" />
</td>
</tr>
<tr>

<td style="width:10%">

Gender: </td><td colspan="3" style="width:90%">Female&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="f">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male<input type="radio" name="gender" value="m">
</td>
</tr>

<tr>

<td colspan="4" style="width:100%">
Specialties:
<!--  <select name="specialties">
<option value="orthopedic">Orthopedic</option>
<option value="pediatrics">Pediatrics</option>
<option value="opthomology">Opthomology</option></select>
-->
<!-- add php code here for selecting values for drop down list -->
<?php
//echo $db->getList('rf_spclty_type','spclty_type_cd','description',$specialties);

?>
<option value="<?php echo $row['description'];?>">
<?php
echo $row['description'];
?>
</option>
<?php
}
?>
</select>

<!-- code above added -->
</td>
</tr>


<tr>
<td colspan="4" style="width:100%">
<p class="bold">
Phone Number(s)
</p>
</td>
</tr>
<tr>
<td colspan="4">

<table style="width:70%">
<tr>
<td style="width:10%">
Work:</td> <td style="width:40%"><input type="text" name="work"  value="<?php echo $work;?>"
size="15" maxlength="15" />
</td>
<td style="width:10%">
Cell:</td><td style="width:40%"><input type="text" name="cell"  value="<?php echo $cell;?>"
size="15" maxlength="15"/>
</td>
</tr>
<tr><td  style="width:10%">
<p>
Email:</p></td> <td colspan="3" style="width:90%"><p><input type="text" name="email" size="75" maxlength="75"
 value="<?php echo $email;?>"
/>
</p>
</td>

</tr>
<tr>

<td colspan="4">
Notification Preference:&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;<input type="radio" name="notifypref" value="email">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text<input type="radio" name="notifypref" value="text">
</td>
</tr>
</table>
</td>
</tr>

<tr>

<td colspan="4" style="width:100%;">
<table style="width:60%;" align="center"><tr>
<td style="width:33%;">
<p> <input type="submit" name="action" value="Change Password" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 140px"/>
</p>
</td>
<td style="width:33%;">
<p> &nbsp; &nbsp; &nbsp;<input type="submit" name="action" value="Save" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
</p>
</td>
<td style="width:33%;">
<p>
<input type="submit" name="action" value="Close" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
</p>
</td>

</tr>
</table>
</td></tr>


</table>

</td></tr></table>

</td>
</tr>


	<?php
 	include( "footer.php");
 ?>

</table>

</form>
</body>
</html>
<?php
mysql_close($con);
} else {

	if(isset($_POST['action']))
	{
		if( $_POST['action']=='Change Password')
			$nextpage='maind.php';
		if( $_POST['action']=='Save'){
			$lastname = $_POST['lastname'];
			$firstname =  $_POST['firstname'];
			//$account_id= $_POST['account_id'];
		//	$account_id= $_REQUEST['account_id'];
		//	$account_id= $_SESSION['account_id'];
			$account_id=$_SESSION['staff_account_id'];
			$specialties=$_POST['specialties'];
			$organization=$_POST['organization'];
			$email=$_POST['email'];
			$work=$_POST['work'];
			$cell=$_POST['cell'];

			$con = mysql_connect("localhost","root");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("prijal_healthmd", $con);
			
			$result = mysql_query("SELECT * FROM  org_staff WHERE account_id = '$account_id'");
			$num_rows = mysql_num_rows($result);
			
			if($num_rows==0)
				mysql_query("INSERT INTO org_staff (staff_id,account_id,spclty_type_cd,last_name,first_name,email_address,work_phone,cell_phone)
					VALUES (0,'$account_id','$specialties',$lastname','$firstname','$email','$work','$cell')");
			else			
			mysql_query("UPDATE org_staff SET spclty_type_cd='$specialties',last_name='$lastname',first_name='$firstname',email_address='$email',work_phone='$work',cell_phone='$cell' WHERE account_id = '$account_id'");
			mysql_close($con);
			$nextpage='maind.php';
		}else if( $_POST['action']=='Close')
			$nextpage='maind.php';
	}
	header("location:".$nextpage);
	exit;
}
?>