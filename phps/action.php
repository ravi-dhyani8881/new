<?php 
require_once '../classes/DB.class.php';  
if(isset($_POST['action']))
{
	if( $_POST['action']=='New Referral')
		$nextpage=1;
	else if( $_POST['action']=='Next')
		$nextpage=2;
	else if( $_POST['action']=='Send Referral Results')
		$nextpage=3;
	else if( $_POST['action']=='View Details')
		$nextpage=6;
	else if( $_POST['action']=='Update Status')
		$nextpage=0;
	else if( $_POST['action']=='Send Results')
		$nextpage=0;
	else if( $_POST['action']=='Cancel')
		$nextpage=0;
}
if(isset($_POST['action_nr']))
{
	if( $_POST['action_nr']=='Send Now')
		$nextpage=0;
	else if( $_POST['action_nr']=='Send Later')
		$nextpage=0;
}
if(isset($_POST['action_sr']))
{
	if( $_POST['action_sr']=='Send Now')
		$nextpage=0;
	else if( $_POST['action_sr']=='Send Later')
		$nextpage=0;
	else if( $_POST['action_sr']=='Attach Files')
		$nextpage=0;
}
if(isset($_GET['link']))
{
	if( $_REQUEST['link']==1)
		$nextpage=0;
	else if( $_REQUEST['link']==2)
		$nextpage=5;
	else if( $_REQUEST['link']==3)
		$nextpage=5;
	else if( $_REQUEST['link']==4)
		$nextpage=5;
	else if( $_REQUEST['link']==5)
		$nextpage=0;
}
/*$db = new DB();
$db->connect();
$data = array(
		"idname" => "0",
		"firstname" => "'firstname'",
		"lastname" => "'lastname'",
		"organization" => "'organization'"
);
$db->insert($data, 'name');
*/
header("location:main.php?nextpage=".$nextpage);
exit;
?> 