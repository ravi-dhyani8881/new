<?PHP

require_once '../classes/DB.class.php';
$dbConf = new DB();
$con = mysql_connect($dbConf->get_db_host(), $dbConf->get_db_user(), $dbConf->get_db_pass());
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbConf->get_db_name(), $con);
$id = $_REQUEST['id'];
$quer = mysql_query("select * from user_account where LOGIN_ID = '$id'");
$cc = mysql_num_rows($quer);
echo $cc;
?>