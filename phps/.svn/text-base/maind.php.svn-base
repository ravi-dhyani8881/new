<?php

require_once '../includes/global.inc.php';
include( "doctorSession.php");

if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
 	include( "header.php");
 ?>


<tr>

<td style="background-color: rgb(255, 255, 255);
height: 600px;
width: 300px;">

	<?php

 	include( "navigationd.php");

 ?>

</td>

<td style="background-color:white;height:600px;width:900px;text-align:top;">

<table style="margin:40px;width:800px; height:400px;" cellpadding="0" cellspacing="0" >

<tr>

<td style="text-align:left;vertical-align:top" >

Welcome to Referral MD Network

</td>

</tr>

</table>

<table style="width:60%;text-align:center;">

<tr>

<td style="width:33%;">



<p> <input type="submit" name="action" value="New Referral" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>

</p>

</td>

<td style="width:33%;">

<p>

<input type="submit" name="action" value="Send Referral Results" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 174px"/>

</p>

</td>

<td style="width:33%;">



<p> <input type="submit" name="action" value="New Patient" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>

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

			$nextpage='addpatient.php';

	}

	header("location:".$nextpage);

	exit;

}

?>