<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
    include( "header.php");
    ?>
  
   

   
    <tr>
        <td style="background-color:#F7F7F7;height:600px;width:300px;vertical-align:top; border: 1px solid #C3CFD9; box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);">
            <?php
            include( "navigationp.php");           
            ?>
        </td>
       <td style="background-color:white;width:900px;text-align:top;float:left;">
<table style="margin: 40px 50px 40px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td >

                                    <span class="left-box"></span><span class="cent-box" style="width:758px;">Feature not avilable</span><span class="right-box"></span>

                                </td></tr>
                <tr><td>
                        <?php /* ?><div style="hidden"><input type="hidden" name="account_id" value="<?php echo $_REQUEST['account_id']; ?>" /></div>
                          <?php */ ?>
                        <table class="main" style="width:100%">
		<tr><td class="Left" style=" width: 60%;">
                                    <p class="bold">This feature will not be avilable at beta release </p></td>
                                <td class="Right">
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
							        </table>
                                </td>
                            </tr>


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
    mysql_close($con);
} else {

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'Save') {
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
			$firstname = $_POST['firstname'];
            //$account_id= $_POST['account_id'];
            //$account_id= $_REQUEST['account_id'];
            //	$account_id= $_SESSION['account_id'];
            //	if( isset($_SESSION['doctor_view_patients']) && $_SESSION['doctor_view_patients']=="Y" && isset($_SESSION['dv_account_id'])){
            //		$account_id=$_SESSION['dv_account_id'];
            //	}
            $account_id = $_SESSION['patient_account_id'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip1 = $_POST['zip'];
            $work1 = $_POST['work'];
            $cell1 = $_POST['cell'];

            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $middlename1 = $_POST['middleName'];
            $notifypref = $_POST['notifypref'];
            $dateOfBirth = $_POST['dob'];
            




            $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }

            mysql_select_db($_SESSION['databaseName'], $con);

            $result = mysql_query("SELECT * FROM  patient WHERE account_id = '$account_id'");
            $num_rows = mysql_num_rows($result);

            if ($num_rows == 0) {
                mysql_query("INSERT INTO patient (patient_id,account_id,last_name,first_name,email_address, middle_name ,ADDR_street1 ,ADDR_CITY , WORK_PHONE , CELL_PHONE , ZIP_CD , GENDER_REPLACE , NOTIFICATION_PRE , ADDR_STATE , DATE_OF_BIRTH  )
	VALUES (0,'$account_id','$lastname','$firstname','$email' , '$middlename1','$street' , '$city', '$work1' ,'$cell1', '$zip1' , '$gender' , '$notifypref' , '$state' , '$dateOfBirth' )");
            } else {

                mysql_query("update patient set last_name='$lastname',first_name='$firstname',email_address='$email' , WORK_PHONE='$work1'
                        , middle_name='$middlename1' , ADDR_street1='$street' , ADDR_CITY='$city' , ZIP_CD='$zip1' , CELL_PHONE='$cell1' , GENDER_REPLACE='$gender' , NOTIFICATION_PRE='$notifypref' ,ADDR_STATE='$state' , DATE_OF_BIRTH='$dateOfBirth' WHERE account_id = '$account_id' ");
            }




            $nextpage = 'patientprofile.php?msg=update';
        } else if ($_POST['action'] == 'Close')
            $nextpage = 'mainp.php';
    }

    header("location:" . $nextpage);
    exit;
}
?>