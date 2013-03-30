<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) {
 	include( "header.php");
 ?>
<tr>
<td style="background-color:white;height:600px;width:300px;vertical-align:middle;">
	<?php
 	include( "navigationd.php");
 	$con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
	 	if (!$con)
	 	{
	 		die('Could not connect: ' . mysql_error());
			}
	 	mysql_select_db($_SESSION['databaseName'], $con);
		$referral_id=$_SESSION['referral_id'];
	 	$result = mysql_query("SELECT staff_id,patient_id,tests_to_perform_txt , spcl_inst_txt, other_comments_txt FROM dr_patient_refrl WHERE referral_id = '$referral_id'");
	 	$row = mysql_fetch_assoc($result);
		$staff_id = $row['staff_id'];
	 	$patient_id =  $row['patient_id'];
	 	$tests_to_perform_txt = $row['tests_to_perform_txt'];
	 	$spcl_inst_txt = $row['spcl_inst_txt'];
		$other_comments_txt = $row['other_comments_txt'];
		$result = mysql_query("SELECT last_name,first_name , GENDER_REPLACE , DATE_OF_BIRTH from PATIENT where patient_id = '$patient_id'");
		$patient_row = @mysql_fetch_assoc($result);
		$last_name = $patient_row['last_name'];
		$first_name = $patient_row['first_name'];
		echo "Staff id is $staff_id";
		$dr_result = mysql_query("SELECT last_name, first_name, org_name from ORG_STAFF where staff_id = '$staff_id'");
		$dr_row = @mysql_fetch_assoc($dr_result);
		$dr_firstName = $dr_row['first_name'];
		$dr_lastName = $dr_row['last_name'];
		$dr_orgName = $dr_row['org_name'];
 ?>
</td>
       <td style="background-color:white;width:900px;text-align:top;float:left;">
<table style="margin: 40px 50px 40px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td >
                                    <span class="left-box"></span><span class="cent-box" style="width:758px;">View Referral</span><span class="right-box"></span>
                       </td></tr>
<tr><td>
<table class="main" style="width:100%;" >
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Referring Physician Information</p></td>
                                <td class="Right">
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Name:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" readonly name="drname" value = "<?php echo $dr_firstName." ".$dr_lastName;?>" size="50" maxlength="50" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Organization:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" name="organization" value ="<?php echo $dr_orgName;?>" size="50" maxlength="50" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Patient Information</p></td>
                                <td class="Right">
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Name:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="name" class="width320" value="<?php echo $first_name.' '.$last_name;?>" size="50" maxlength="50" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Gender:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" name="gender" value="<?php if ($patient_row['GENDER_REPLACE'] == 'M') {
                                        echo 'Male';
                                    } elseif ($patient_row['GENDER_REPLACE'] == 'F') {
                                        echo 'Female';
                                    } else {
                                        echo 'Not Mention';                                     
                                    }
                                    ?>" size="10" maxlength="10" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Date of Birth:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="dob" class="width320" value="<?php echo $patient_row['DATE_OF_BIRTH']; ?>" size="10" maxlength="dob" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Status:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="status" size="10" maxlength="status" class="width320" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Detail of Referral</p></td>
                                <td class="Right">
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Test(s) to Perform:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" cols="50" class="width320" readonly name="testtoperform">
<?php echo $tests_to_perform_txt;?>
</textarea></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Special Instructions:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" cols="50" class="width320" readonly name="specialinstructions">
<?php echo $spcl_inst_txt;?>
</textarea></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Other Comments:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" class="width320" cols="50" readonly name="othercomments">
<?php echo $other_comments_txt;?>
</textarea></p>
                                </td>
                            </tr>
<tr class="textBoxTable">
                                <td colspan="2" style="float:left;margin-left:220px;">
                                    <input type="submit" name="action" value="Update Status" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
									<input type="submit" name="action" value="Send Results" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px;margin-left:20px;"/>
									<input type="submit" name="action" value="Cancel" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px;margin-left:20px;"/>
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
		if( $_POST['action']=='Update Status')
			$nextpage='maind.php';
		else if( $_POST['action']=='Send Results')
			$nextpage='sendreferralresults2.php';
		else if( $_POST['action']=='Cancel')
			$nextpage='maind.php';
	}
	header("location:".$nextpage);
	exit;
}
?>