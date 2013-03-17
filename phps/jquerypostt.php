<?PHP 

$con = mysql_connect("localhost","linuxwin_testing", "LeV%pxVhK~d@");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("linuxwin_testing", $con);
$id= $_REQUEST['id'];
$quer = mysql_query("select * from user_account where LOGIN_ID = '$id'");
$cc = mysql_num_rows($quer);

if ($cc = 0){
		echo "1";
	} else {
		
	}
?>