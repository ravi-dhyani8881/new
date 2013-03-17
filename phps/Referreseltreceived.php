<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
    include( "header.php");
    ?>

    <style type="text/css" >
        #swfupload-control p{ margin:10px 5px; font-size:0.9em; }
        #log{ margin:0; padding:0; width:460px;}
        #log li{ list-style-position:inside; margin:2px; border:1px solid #ccc; padding:10px; font-size:12px; 
                 font-family:Arial, Helvetica, sans-serif; color:#333; background:#fff; position:relative;}
        #log li .progressbar{ border:1px solid #333; height:5px; background:#fff; }
        #log li .progress{ background:#999; width:0%; height:5px; }
        #log li p{ margin:0; line-height:18px; }
        #log li.success{ border:1px solid #339933; background:#ccf9b9; }
        #log li span.cancel{ position:absolute; top:5px; right:5px; width:20px; height:20px; 
                             background:url('../resources/js/swfupload/cancel.png') no-repeat; cursor:pointer; }
        </style>

        <tr>
            <td style="background-color:white;height:600px;width:300px;vertical-align:middle;">
                <?php
                include( "navigationd.php");

                $account_id = $_SESSION['referral_id'];
                $referral_id = $_SESSION['referral_id'];
                $result = mysql_query("SELECT staff_id,patient_id,tests_to_perform_txt , spcl_inst_txt, other_comments_txt FROM dr_patient_refrl WHERE referral_id = '$referral_id'");
                $row = mysql_fetch_assoc($result);
                $staff_id = $row['staff_id'];
                $patient_id = $row['patient_id'];
                $tests_to_perform_txt = $row['tests_to_perform_txt'];
                $spcl_inst_txt = $row['spcl_inst_txt'];
                $other_comments_txt = $row['other_comments_txt'];

                // get details from the PATIENT table

                $result = mysql_query("SELECT last_name,first_name , GENDER_REPLACE , DATE_OF_BIRTH from PATIENT where patient_id = '$patient_id'");

                $patient_row = mysql_fetch_assoc($result);

                $last_name = $patient_row['last_name'];

                $first_name = $patient_row['first_name'];


                $dr_result = mysql_query("SELECT last_name, first_name, org_name from ORG_STAFF where staff_id = '$staff_id'");

                $dr_row = mysql_fetch_assoc($dr_result);

                $dr_firstName = $dr_row['first_name'];

                $dr_lastName = $dr_row['last_name'];

                $dr_orgName = $dr_row['org_name'];

                $other_result = mysql_query("SELECT TESTS_TO_PERFORM_TXT , SPCL_INST_TXT , OTHER_COMMENTS_TXT  , attachment1 , attachment2 , attachment3 , attachment4 , attachment5 from dr_patient_refrl where ( REFERRAL_ID = '$account_id' && STAFF_ID = '$staff_id' &&  PATIENT_ID = '$patient_id' ) ");

                $other_row = mysql_fetch_assoc($other_result);
                ?>

        </td>
        <td style="background-color:white;width:900px;text-align:top;float:left;">
            <table style="margin: 40px 50px 40px;width:800px" cellpadding="0px" cellspacing="0px;" >


                <tr><td >

                        <span class="left-box"></span><span class="cent-box" style="width:758px;">Referral Results </span><span class="right-box"></span>

                    </td></tr>

                <tr><td>

                        <table class="main" style="width:100%">
                            <tr><td class="Left">
                                    <p>Referral:</p></td>
                                <td class="Right">
                                    <span id="hfield"></span>
                                    <p><input class="width320" type="text" id="providername" name="referal" value="<?php
            echo$first_name;
            echo'    ';
            echo$last_name;
            ?>" size="50" maxlength="50" /></p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Provider Information</p></td>
                                <td class="Right">
                                    <p>&nbsp;
                                    </p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Name:</p></td>
                                <td class="Right">
                                    <span id="hfield"></span>
                                    <p><input class="width320" type="text" id="providername" value="<?php echo $dr_firstName . " " . $dr_lastName; ?>" name="providername" size="50" maxlength="50" /></p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Organization:</p></td>
                                <td class="Right">
                                    <p><input class="width320" type="text" id="organization" value="<?php echo $dr_orgName; ?>" name="organization" size="50" maxlength="50" /></p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Patient Information</p></td>
                                <td class="Right">
                                    <p>&nbsp;
                                    </p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Name:</p></td>
                                <td class="Right">
                                    <p><input class="width320" type="text" id="patientname" value="<?php
            echo$first_name;
            echo'    ';
            echo$last_name;
            ?>" name="patientname" size="50" maxlength="50" /></p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Gender:</p></td>
                                <td class="Right">
                                    <p><input class="width320" type="text" id="gender" name="gender" value="<?php
            if ($patient_row['GENDER_REPLACE'] == 'M') {
                echo 'Male';
            } elseif ($patient_row['GENDER_REPLACE'] == 'F') {
                echo 'Female';
            } else {
                echo 'Not Mention';
            }
            ?>"

                                              size="10" maxlength="10" /></p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Date of Birth:</p></td>
                                <td class="Right">
                                    <p><input class="width320" type="text" id="pdob" value="<?php echo $patient_row['DATE_OF_BIRTH']; ?>" name="dob" id="datepicker" /></p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Test(s) to Perform:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" cols="50" id="testtoperform" name="testtoperform" class="width320">
    <?php echo $tests_to_perform_txt; ?>
                                        </textarea></p>
                                </td>
                            </tr>


                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Special Instructions:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" cols="50" id="specialnstruc" name="specialnstruc" class="width320">
    <?php echo $spcl_inst_txt; ?>
                                        </textarea></p>
                                </td>
                            </tr>

                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Other Comments:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" cols="50" id="othercomment" name="othercomment" class="width320">
    <?php echo $other_comments_txt; ?>
                                        </textarea></p>
                                </td>
                            </tr>

                            <tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Generic Information</p></td>
                                <td class="Right">
                                    <p>&nbsp;
                                    </p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Test Results:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" cols="50" name="testresults" class="width320">
    <?php echo $other_row['TESTS_TO_PERFORM_TXT']; ?>
                                        </textarea></p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Interpretations & Comments:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" cols="50" name="intercomments" class="width320">
    <?php echo $other_row['SPCL_INST_TXT']; ?>
                                        </textarea></p>
                                </td>
                            </tr>

                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Recommended Treatment:</p></td>
                                <td class="Right">
                                    <p><textarea rows="4" cols="50" name="treatment" class="width320">
    <?php echo $other_row['OTHER_COMMENTS_TXT']; ?>
                                        </textarea></p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>Attached files:</p></td>
                                <td class="Right">
                                    <div id="swfupload-control">
                                       <?php
                                       
                                       if($other_row['attachment1']!=NULL){
                                           echo '<ol id="log">';                                           
                                           echo '<li id="SWFUpload_0_0" class="success">';
                                           echo 'File: <em>Lighthouse.jpg</em>';
                                           echo ' <p class="status"> ';
                                               
                                           echo ' <a target="_blank" href="uploads/Lighthouse.jpg">view »</a>';
                                           echo ' </p><span class="cancel" style="display: none;">&nbsp;</span>';
                                           echo '</li>';
                                           echo '</ol>';                                           
                                       }
                                       
                                       
                                       
                                       ?>
                                        
                                       
                                    </div>
                                </td>
                            </tr>
                            <tr class="textBoxTable">
                                <td colspan="2" style="float:left;margin-left:220px;">

                                    <input type="submit" name="action" value="Cancel" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px;margin-left:20px;"/>
                                </td></tr>

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
} else {

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'Cancel') {
            $nextpage = 'viewreferralreceived.php?status_cd=3';
        }
    }
    header("location:" . $nextpage);
    exit;
}
?>