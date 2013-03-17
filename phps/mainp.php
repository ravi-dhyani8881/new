<?php
require_once '../includes/global.inc.php';
include( "patientSession.php");
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form

 	include( "header.php");
 ?>
<tr>
<td style="background-color:#F7F7F7;height:600px;width:300px;vertical-align:top; border: 1px solid #C3CFD9; box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);">
	<?php
 	include( "navigationp.php");
 ?>
</td>
<td style="background-color:white;height:600px;width:900px;text-align:top;">
<table style="margin:40px;width:800px;height:400px" cellpadding="0px" cellspacing="0px;" >
<tr>
<td style="text-align:left;vertical-align:top; color:#06365F;" >
Welcome to Referral MD Network
</td>
</tr>
</table>
<table style="width:60%;text-align:center;">
<tr>
<td style="width:33%;">

<p> <input type="submit" name="action" value="Invite a friend" style="background-color:  #3a6a8e;border-radius:5px;height: 35px; width: 100px"/>
</p>
</td>
<td style="width:33%;">
<p>
<input type="submit" name="action" value="Authorize Doctor" style="background-color:  #3a6a8e;border-radius:5px;height: 35px; width: 140px"/>
</p>
</td>

</tr>
</table>

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
		if( $_POST['action']=='New Referral')
			$nextpage='newreferralpage1.php';
		else if( $_POST['action']=='Send Referral Results')
			$nextpage='sendreferralresults2.php';
		else if( $_POST['action']=='New Patient')
			$nextpage='sendreferralresults2.php';
	}
	header("location:".$nextpage);
	exit;
}
?>