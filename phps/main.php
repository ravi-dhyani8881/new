<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../resources/styles/referral.css" />
  <title>ReferralMD</title>
 </head>
<body>
<form   action="action.php" method="post">
<table width="1200" border="0" cellspacing="5" cellpadding="5" >
<tr>
<td colspan="2" style="background-color:#006699;color:white;font-style:italic">
<h1>Referral Portal</h1>
</td>
</tr>

<tr>
<td style="background-color:white;height:600px;width:300px;vertical-align:middle;">
 <table id="navigation" title="Navigation" border="0"
 class="menu" cellspacing="15" cellpadding="15" >
            <tr><td><a  href="action.php?link=1" >Patients</a></td></tr>
            <tr><td><a  href="action.php?link=2" >Referrals Received</a></td></tr>
            <tr><td><a  href="action.php?link=3" >Referrals sent</a></td></tr>
            <tr><td><a  href="action.php?link=4" >Referrals to be sent</a></td></tr>
            <tr><td><a  href="action.php?link=5" >Reports</a></td></tr>
         </table>
</td>
<td style="background-color:white;height:600px;width:900px;text-align:top;">
	<div title="Status" id="status">
	</div>
		<div title="Content" id="content">
		<?php
	if(!isset($_REQUEST['nextpage']) || $_REQUEST['nextpage']==0 ){
           include( "welcome.php") ;
		} else {
         	if($_REQUEST['nextpage']==1)
             include( "newreferralpage1.php") ;
             else  if($_REQUEST['nextpage']==2)
              include( "newreferralpage2a.php");
             else  if($_REQUEST['nextpage']==3)
             	include( "sendreferralresults.php");
             else  if($_REQUEST['nextpage']==4)
             	include( "sendreferralresults2.php");
             else  if($_REQUEST['nextpage']==5)
             	include( "viewreferralreceived.php");
             else  if($_REQUEST['nextpage']==6)
             	include( "viewreferral.php");
         }
              ?>
       </div>

</td>
</tr>

<tr>
<td colspan="2" style="background-color:#006699;text-align:center;color:white;font-style:italic">
<h3>Copyright © prijal.com</h3></td>
</tr>

</table>

</form>
</body>
</html>