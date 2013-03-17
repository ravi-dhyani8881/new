<html>
<head>
<link rel="stylesheet" type="text/css" href="../resources/styles/referral.css" />
  <title>ReferralMD</title>
 </head>
<body>
<form   action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table width="1200" border="0" cellspacing="0" cellpadding="0" bgcolor="#fff" align="center" >
<tr>
<td colspan="2" style="background-color:white;color:#06365F;font-style:italic;font-decoration:bold;font-size:36px; font-family:trebuchet ms;  padding-top: 10px;  position: relative; z-index:100;" align="center" class="logo-top">
<img src="../resources/logo.png" alt="Prijal" height="35px" style="float:left;">eReferral Portal
<?php
if(isset($_SESSION['llogin']))
{
echo '<div style="float:right; vertical-align:top"  class="log-out"><a href="logout.php" style="font-size:15px;">Logout</a></div>';
}
?>
</td>
</tr>
<link rel="stylesheet" href="../resources/css/common.css" type="text/css"></link>
<script src="../resources/js/jquery.min.js" type="text/javascript"></script>
<script src="../resources/js/jquery.maskedinput.js.js" type="text/javascript"></script>
<script src="../resources/js/script.js" type="text/javascript"></script>
<link href="../resources/js/jquery.alerts.css" rel="stylesheet" type="text/css"/>
<script src="../resources/js/jquery.alerts.js"></script>
<script type="text/javascript" src="../resources/js/swfupload/swfupload.js"></script>
<script type="text/javascript" src="../resources/js/jquery.swfupload.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />