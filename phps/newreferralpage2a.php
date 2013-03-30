<?php
require_once '../includes/global.inc.php';

if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
    include( "header.php");
    ?>

    <tr>

        <td style="background-color:white;height:600px;width:300px;vertical-align:middle;">

    <?php
    include( "navigationd.php");

    $doctor_account_id = $_SESSION['staff_account_id'];



    echo "doctor_account_id $doctor_account_id";



    $last_referral_id = $_SESSION['staff_account_id'];

    echo "last_referral_id $last_referral_id";

    $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);



    if (!$con) {

        die('Could not connect: ' . mysql_error());
    }



    mysql_select_db("prijal_healthmd", $con);

    $result = mysql_query("SELECT staff_id FROM  org_staff WHERE account_id = '$doctor_account_id'");

    $row = mysql_fetch_assoc($result);

    $staff_id = $row['staff_id'];

    echo "staff_id $staff_id";

    $result = mysql_query("select referral_id, patient_id, rfrd_staff_id, tests_to_perform_txt, spcl_inst_txt,other_comments_txt

 			from  dr_patient_refrl where staff_id='$staff_id' and referral_id='$last_referral_id'");

    $row = mysql_fetch_assoc($result);

    $referral_id = $row['referral_id'];

    $patient_id = $row['patient_id'];

    $rfrd_staff_id = $row['rfrd_staff_id'];

    $tests_to_perform_txt = $row['tests_to_perform_txt'];

    $spcl_inst_txt = $row['spcl_inst_txt'];

    $other_comments_txt = $row['other_comments_txt'];
    ?>

        </td>

        <td style="background-color:white;width:900px;text-align:top;float:left;">
<table style="margin: 40px 50px 40px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td >

                                    <span class="left-box"></span><span class="cent-box" style="width:758px;">Patient Referral</span><span class="right-box"></span>

                                </td></tr>

                <tr><td>



                        <table class="main" style="width:100%;" >
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Test(s) to Perform:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" class="width320" cols="50" name="testtoperform" ><?php echo $tests_to_perform_txt; ?></textarea></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Special Instructions:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" cols="50" class="width320" name="specialinstructions"><?php echo $spcl_inst_txt; ?></textarea></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Other Comments:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" cols="50" class="width320" name="othercomments"><?php echo $other_comments_txt; ?></textarea></p>
                                </td>
                            </tr>
<tr class="textBoxTable">
                                <td colspan="2" style="float:left;margin-left:220px;">
                                    <input type="submit" name="action" value="Send Now" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
									<input type="submit" name="action" value="Send Later" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px;margin-left:20px;"/>
									<input type="submit" name="action" value="Cancel" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px;margin-left:20px;"/>
                                </td></tr>							

                           
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





        $tests_to_perform_txt = $_POST['testtoperform'];

        $spcl_inst_txt = $_POST['specialinstructions'];

        $other_comments_txt = $_POST['othercomments'];



//		echo " tests_to_perform_tx $tests_to_perform_txt";
//		echo " spcl_inst_txt $spcl_inst_txt";
//		echo " other_comments_txt $other_comments_txt";





        $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);

        if (!$con) {

            die('Could not connect: ' . mysql_error());
        }



        mysql_select_db($_SESSION['databaseName'], $con);

        $doctor_account_id = $_SESSION['staff_account_id'];

        //	echo "doctor_account_id $doctor_account_id";

        $result = mysql_query("SELECT staff_id FROM  org_staff WHERE account_id = '$doctor_account_id'");

        $row = mysql_fetch_assoc($result);

        $staff_id = $row['staff_id'];

//		echo "staff_id $staff_id";



        $last_referral_id = $_SESSION['last_referral_id'];





        if ($_POST['action'] == 'Send Now') {

            mysql_query("update dr_patient_refrl set tests_to_perform_txt='$tests_to_perform_txt',

					spcl_inst_txt='$spcl_inst_txt',other_comments_txt='$other_comments_txt',

					rfrng_status_cd=2, rfrd_status_cd=3

					 WHERE referral_id = '$last_referral_id' and staff_id='$staff_id' ");



            $nextpage = 'viewreferralsent.php?status_cd=2&msg=update';
        } else if ($_POST['action'] == 'Send Later') {

            mysql_query("update dr_patient_refrl set tests_to_perform_txt='$tests_to_perform_txt',

					spcl_inst_txt='$spcl_inst_txt',other_comments_txt='$other_comments_txt',

					rfrng_status_cd=1

					WHERE referral_id = '$last_referral_id' and staff_id='$staff_id' ");

            $nextpage = 'maind.php';
        } else if ($_POST['action'] == 'Cancel')
            $nextpage = 'maind.php';

        mysql_close($con);
    }

    header("location:" . $nextpage);

    exit;
}
?>