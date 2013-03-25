<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
    include( "header.php");
    ?>

<script type="text/javascript">
       function getDoctoreDetails(){
           var docId=$('#doctorname').find("option:selected").val()
           if(docId!=null){               
               $.getJSON("checkEmailExist.php?email="+docId+'&method=doctorDetails', function(data) {            			
                        $('#city').empty().val(data.ADDR_CITY);
                        $('#state').empty().val(data.ADDR_state_desc);
                    });
           }
       }
    </script>
    <tr>
        <td style="background-color:white;height:600px;width:300px;vertical-align:middle;">
            <?php
            include( "navigationd.php");
            $doctor_account_id = $_SESSION['staff_account_id'];
            $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db($_SESSION['databaseName'], $con);

            $result = mysql_query("select referral_id,staff_id,patient_id, rfrd_staff_id from  dr_patient_refrl where staff_id='$doctor_account_id'");

            $row = mysql_fetch_assoc($result);

            $staff_id = $row['staff_id'];

            $patient_id = $row['patient_id'];

            $rfrd_staff_id = $row['rfrd_staff_id'];
            ?>

        </td>

        <td style="background-color:white;width:900px;text-align:top;float:left;">
            <table style="margin: 40px 50px 40px;width:800px" cellpadding="0px" cellspacing="0px;" >

                <tr><td >

                        <span class="left-box"></span><span class="cent-box" style="width:758px;">Patient Referral </span><span class="right-box"></span>

                    </td></tr>

                <tr><td>



                        <table class="main" style="width:100%">
                            <tr><td class="Left">
                                    <p>Referral Type:</p></td>
                                <td class="Right">
                                    <p>Practice<input type="radio" name="type" value="practice">&nbsp;&nbsp;&nbsp;Physician<input type="radio" name="type" value="physician">
                                        &nbsp;&nbsp;&nbsp;Dentist<input type="radio" name="type" value="dentist">&nbsp;&nbsp;&nbsp;Hospital<input type="radio" name="type" value="hospital">&nbsp;&nbsp;&nbsp;Nurse<input type="radio" name="type" value="nurse">
                                        &nbsp;&nbsp;&nbsp;Administrator<input type="radio" name="type" value="administrator">&nbsp;&nbsp;&nbsp;Laboratory<input type="radio" name="type" value="laboratory">
                                        &nbsp;&nbsp;&nbsp;Radiology<input type="radio" name="type" value="radiology"></p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        &nbsp;</p></td>
                                <td class="Right">
                                    <p><span class="fltLftSelect">Other:</span><input type="text" class="width320" name="other"

                                                                                      size="50" maxlength="50"/></p>
                                </td>
                            </tr>

                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Select Doctor to refer to:</p></td>
                                <td class="Right">
                                    <p><span class="fltLftSelect">Name:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        <select name="doctorname" id="doctorname" onchange="getDoctoreDetails();" class="selectBox">

                                            <!--
                                            
                                            <option value="John Doe">John Smith</option>
                                            
                                            <option value="Jane Doe">Jane Smith</option>
                                            
                                            -->

                                            <?php
                                            echo $db->getDoctorsList($doctor_account_id, $rfrd_staff_id);
                                            ?>

                                        </select></p>
                                </td>
                            </tr>

                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        &nbsp;</p></td>
                                <td class="Right">
                                    <p><span class="fltLftSelect">Specialty:</span>

                                        <select name="specialties" class="selectBox">

                                            <!--  option value="orthopedic">Orthopedic</option>
                                            
                                            <option value="pediatrics">Pediatrics</option>
                                            
                                            <option value="opthomology">Opthomology</option>
                                            
                                            -->

                                            <?php
                                            echo $db->getList('rf_spclty_type', 'spclty_type_cd', 'description', '9');
                                            ?>

                                        </select></p>
                                </td>
                            </tr>

                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Location:</p></td>
                                <td class="Right">
                                    <p><span class="fltLftSelect">City:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="text" id="city" name="city" size="25" maxlength="25" value="" class="width320"/></p>
                                </td>
                            </tr>

                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        &nbsp;</p></td>
                                <td class="Right">
                                    <p><span class="fltLftSelect">State:</span>
                                        
                                         <input type="text" id="state" name="state" size="25" maxlength="25" value="" class="width320"/>
                                        
                                    </p>
                                </td>
                            </tr>
                            <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Select Patient:</p></td>
                                <td class="Right">
                                    <p><span class="fltLftSelect">Name:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        <select name="patientname" class="selectBox">

                                            <!--
                                           
                                           <option value="John Doe">Rick Williams</option>
                                           
                                           <option value="Jane Doe">James Williams</option>
                                           
                                            -->

                                            <?php
                                            echo $db->getPatientsList($doctor_account_id, $patient_id);
                                            ?>

                                        </select>
                                    </p>
                                </td>
                            </tr>
                            <tr class="textBoxTable">
                                <td colspan="2" style="float:left;margin-left:220px;">
                                    <input type="submit" name="action" value="Next" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
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
    mysql_close($con);
} else {



    if (isset($_POST['action'])) {

        $doctor_account_id = $_SESSION['staff_account_id'];
        $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
        if (!$con) {

            die('Could not connect: ' . mysql_error());
        }



        mysql_select_db($_SESSION['databaseName'], $con);

        $result = mysql_query("SELECT staff_id FROM  org_staff WHERE account_id = '$doctor_account_id'");

        $row = mysql_fetch_assoc($result);

        $staff_id = $row['staff_id'];

        if ($_POST['action'] == 'Next') {

            $referral_type = $_POST['type'];

            $refer_to = $_POST['doctorname'];

            $patient = $_POST['patientname'];





            mysql_query("INSERT INTO dr_patient_refrl (referral_id,staff_id,patient_id, rfrd_staff_id)

					VALUES (0,'$staff_id','$patient','$refer_to')");



            $result = mysql_query("SELECT max(referral_id) FROM  dr_patient_refrl WHERE staff_id = '$staff_id'");

            $row = mysql_fetch_assoc($result);

            $last_referral_id = $row['max(referral_id)'];

            $_SESSION['last_referral_id'] = $last_referral_id;

            mysql_close($con);

            $nextpage = 'newreferralpage2a.php';
        } else if ($_POST['action'] == 'Cancel')
            $nextpage = 'maind.php';
    }

    header("location:" . $nextpage);

    exit;
}
?>