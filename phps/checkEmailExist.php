<?php

require_once '../classes/DB.class.php';

$dbConf = new DB();
$con = mysql_connect($dbConf->get_db_host(), $dbConf->get_db_user(), $dbConf->get_db_pass());
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbConf->get_db_name(), $con);
$id = $_REQUEST['email'];
$method = $_REQUEST['method'];



if ($method == 'checkmail') {
    $quer = mysql_query("select * from org_staff where EMAIL_ADDRESS = '$id'");
    $cc = mysql_num_rows($quer);
    echo $cc;
} elseif ($method == 'checkmailPatient') {
    $quer = mysql_query("select * from patient where EMAIL_ADDRESS = '$id'");
    $cc = mysql_num_rows($quer);
    echo $cc;
} elseif ($method == 'getreferalDetails') {

    $result = mysql_query("SELECT staff_id,patient_id,tests_to_perform_txt , spcl_inst_txt, other_comments_txt FROM dr_patient_refrl WHERE referral_id = '$id'");
    $row = mysql_fetch_assoc($result);

    $patient_id = $row['patient_id'];
    $staff_id = $row['staff_id'];

    $result = mysql_query("SELECT last_name,first_name , GENDER_REPLACE , DATE_OF_BIRTH from PATIENT where patient_id = '$patient_id'");
    $patient_row = mysql_fetch_assoc($result);

    $dr_result = mysql_query("SELECT last_name, first_name, org_name from ORG_STAFF where staff_id = '$staff_id'");

    $dr_row = mysql_fetch_assoc($dr_result);

    
$finalArray=array("staff_id"=>$row['staff_id'],"patient_id"=>$row['patient_id'],"tests_to_perform_txt"=>$row['tests_to_perform_txt'] ,
    "spcl_inst_txt"=>$row['spcl_inst_txt'] , "other_comments_txt"=>$row['other_comments_txt'] , "plast_name" =>$patient_row['last_name'] ,
    "pfirst_name"=>$patient_row['first_name'] , "pGENDER_REPLACE"=>$patient_row['GENDER_REPLACE'] , "pDATE_OF_BIRTH"=>$patient_row['DATE_OF_BIRTH'],
     "dlast_name"=>$dr_row['last_name'] , "dfirst_name"=>$dr_row['first_name'] , "dorg_name"=>$dr_row['org_name']
    );

    echo json_encode($finalArray);
} else {
    echo 'done';
}
?>
