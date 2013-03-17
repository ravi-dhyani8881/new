<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form

 	include( "header.php");
 ?>
<tr>
<td style="background-color:white;height:600px;width:300px;vertical-align:middle;">
	<?php
 	include( "navigationd.php");

 	// get referral info from db
	 $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
	 if (!$con)
	 	{
	 		die('Could not connect: ' . mysql_error());
	 	}

	 	mysql_select_db($_SESSION['databaseName'], $con);
	 	$referral_id=$_SESSION['referral_id'];
	 	$result = mysql_query("SELECT staff_id,patient_id,tests_to_perform_txt,
	 		spcl_inst_txt, other_comments_txt
	 		FROM dr_patient_refrl WHERE referral_id = '$referral_id'");
	 	$row = mysql_fetch_assoc($result);
	 	$staff_id = $row['staff_id'];
	 	$patient_id =  $row['patient_id'];
	 	$tests_to_perform_txt = $row['tests_to_perform_txt'];
	 	$spcl_inst_txt = $row['spcl_inst_txt'];
		$other_comments_txt = $row['other_comments_txt'];

		// get details from the PATIENT table
		$result = mysql_query("SELECT last_name,first_name from PATIENT where patient_id = '$patient_id'");
		$patient_row = mysql_fetch_assoc($result);
		$last_name = $patient_row['last_name'];
		$first_name = $patient_row['first_name'];

		// get details from ORG_STAFF table
		echo "Staff id is $staff_id";
		$dr_result = mysql_query("SELECT last_name, first_name, org_name from ORG_STAFF where staff_id = '$staff_id'");
		$dr_row = mysql_fetch_assoc($dr_result);
		$dr_firstName = $dr_row['first_name'];
		$dr_lastName = $dr_row['last_name'];
		$dr_orgName = $dr_row['org_name'];

	// added above

 ?>
</td>
<td style="background-color:white;height:600px;width:900px;text-align:top;">

<table style="margin:40px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td>

<table class="header" style="width:100%">
<tr><td >

Send Referral Results

</td></tr>
</table>
</td>
</tr>
<tr><td>

<table class="main" style="width:100%">

<!--
<tr>
<td  style="width:20%">
<p class="bold">
Select Referral:</p> </td>
<td colspan="3" style="width:80%">
<select name="doctorsname">
<option value="John Doe">John doe</option>
<option value="Jane Doe">Jane Doe</option>
</select>
</td>
</tr>
-->
<tr>
<td  style="width:20%">
<p class="bold">
Referring Doctor:</p> </td>
<td colspan="3" style="width:80%">
Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" readonly name="drname" value = "<?php echo $dr_firstName." ".$dr_lastName;?>" size="50" maxlength="50" />
</td>
</tr>
<tr>
<td style="width:20%">
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td colspan="3" style="width:80%">
Organization: <input type="text" readonly name="organization" value ="<?php echo $dr_orgName;?>" size="50" maxlength="50" />
</td>
</tr>

<tr>
<td  style="width:20%">
<p class="bold">
Patient Information:</p> </td>
<td colspan="3" style="width:80%">
Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" readonly name="name" value="<?php echo $first_name.' '.$last_name;?>" size="50" maxlength="50" />
</td>
</tr>
<!--
<tr>
<td style="width:20%">
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td style="width:30%">
Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="gender" size="10" maxlength="10" />
</td>
<td style="width:50%">
Date of Birth: <input type="text" name="dob" size="10" maxlength="dob" />
</td>
</tr>
-->
<tr>
<td style="width:20%;  vertical-align:top">
<p class="bold">
Test Results:</p> </td><td colspan="3" style="width:80%">
<textarea rows="4" cols="50" name="testresults">

</textarea>
</tr>


<tr>
<td  style="width:20%">
<p class="bold">
Comments:</p> </td>
<td colspan="3" style="width:80%">
<textarea rows="4" cols="50" name="comments">
</textarea>
</td>
</tr>

<tr>

<td colspan="4" style="width:100%;">
<table style="width:80%;" align="center"><tr>
<td style="width:25%;">
<p> <input type="submit" name="action" value="Attach Files" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
</p>
</td>
<td style="width:25%;">
<p> <input type="submit" name="action" value="Send Now" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
</p>
</td>
<td style="width:25%;">
<p> <input type="submit" name="action" value="Send Later" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
</p>
</td>
<td style="width:25%;">
<p>
<input type="submit" name="action" value="Cancel" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
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
} else {

	if(isset($_POST['action']))
	{
		if( $_POST['action']=='Send Now') {

		// save info to db
		$con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($_SESSION['databaseName'], $con);
		$referral_id=$_SESSION['referral_id'];
		$testresults = $_POST['testresults'];
		$comments = $_POST['comments'];

		// update the referral with results

		mysql_query("UPDATE dr_patient_refrl
					SET rfrd_results_txt ='$testresults',
						rfrd_comments_txt='$comments'
						WHERE referral_id = '$referral_id'");

		// added above

			$nextpage='maind.php';
		}
		else if( $_POST['action']=='Send Later')
			$nextpage='maind.php';
		else if( $_POST['action']=='Cancel')
			$nextpage='maind.php';
		else if( $_POST['action']=='Attach Files')
			$nextpage='maind.php';
	}
	//header("location:".$nextpage);
	//exit;
}
?>