<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
    include( "header.php");
    ?>
    <script type="text/javascript">
        jQuery(function($){   
            $("input").attr('disabled','disabled');
            $("option").attr('disabled','disabled');
            $("#cell").mask("(999) 999-9999");
            $("#work").mask("(999) 999-9999? x99999");   
            $("#zip").mask("?99999-9999");   
            var tech = GetURLParameter('msg');
            if(tech=='update'){
                $('#notifications').show();
                $('#notifications').slideUp(4000).delay(25000);
            }   
        });
    </script>
    <span class="notifications" id="notifications" style="display: none;" >		
        <p>Your settings have been updated successfully.</p>
    </span>


    <tr>
        <td style="background-color:white;width:300px;vertical-align:middle; height: 500px;">
            <?php
            
                include( "navigationd.php");
            $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }

            mysql_select_db($_SESSION['databaseName'], $con);
            //	$account_id=$_SESSION['account_id'];
            //	if( isset($_SESSION['doctor_view_patients']) && $_SESSION['doctor_view_patients']=="Y" && isset($_SESSION['dv_account_id'])){
            //		$account_id=$_SESSION['dv_account_id'];
            //	}
            $account_id = $_SESSION['patient_account_id'];
	
            $result = mysql_query("SELECT last_name,first_name,email_address , middle_name ,ADDR_street1 ,
                    ADDR_CITY  , ADDR_STATE ,ZIP_CD , WORK_PHONE , CELL_PHONE , GENDER_REPLACE , NOTIFICATION_PRE , DATE_OF_BIRTH FROM  patient WHERE account_id = '$account_id'");
            $row = mysql_fetch_assoc($result);
            $lastname = $row['last_name'];
            $firstname = $row['first_name'];
            //$gender= $row['gender'];
            $email = $row['email_address'];
            $middleName = $row['middle_name'];
            $street = $row['ADDR_street1'];

            $city = $row['ADDR_CITY'];
            $state = $row['ADDR_STATE'];
            $zip = $row['ZIP_CD'];
            $work = $row['WORK_PHONE'];
            $cell = $row['CELL_PHONE'];
            $dateof = $row['DATE_OF_BIRTH'];
            ?>
        </td>
       <td style="background-color:white;width:900px;text-align:top;float:left;">
<table style="margin: 40px 50px 40px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td >

                                    <span class="left-box"></span><span class="cent-box" style="width:758px;">Patient Profile Information</span><span class="right-box"></span>

                                </td></tr>
<tr><td>
<input type="hidden" name="account_id" value="<?php echo $_SESSION['staff_account_id'];?>"/>
<table class="main" style="width:100%">
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        General Information</p></td>
                                <td class="Right">
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
		<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Last Name:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" name="lastname" value="<?php echo $lastname; ?>"
                                                                              size="35" maxlength="35" /></p>
                                </td>
                            </tr>					
             <tr class="textBoxTable"><td class="Left">
                                    <p>
                                        First Name:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" name="firstname" value="<?php echo $firstname; ?>"
                                                                   size="35" maxlength="35"/></p>
                                </td>
                            </tr>           
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Middle Name:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" value="<?php echo $middleName; ?>" name="middlename"
                                                                                size="35" maxlength="35" /></p>
                                </td>
                            </tr> 
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Gender:</p></td>
                                <td class="Right">
                                    <p><?php
                                    if ($row['GENDER_REPLACE'] == 'M') {
                                        echo 'Female&nbsp;&nbsp;&nbsp;<input  type="radio" style="width:0px;" name="gender" id="gender" value="F">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                        echo 'Male<input type="radio" checked="true" style="width:0px;" name="gender" id="gender" value="M">';
                                    } elseif ($row['GENDER_REPLACE'] == 'F') {
                                        echo 'Female&nbsp;&nbsp;&nbsp;<input  type="radio" style="width:0px;" name="gender" id="gender" checked="true" value="F">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                        echo 'Male<input type="radio" style="width:0px;"  name="gender" id="gender" value="M">';
                                    } else {
                                        echo 'Female&nbsp;&nbsp;&nbsp;<input  type="radio" style="width:0px;" name="gender" id="gender" value="F">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                        echo 'Male<input type="radio"  name="gender" style="width:0px;" id="gender" value="M">';
                                    }
                                    ?></p>
                                </td>
                            </tr> 
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Date of Birth:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" name="dob" value="<?php echo $dateof; ?>" id="datepicker"  /></p>
                                </td>
                            </tr> 
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Address</p></td>
                                <td class="Right">
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Street:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" name="street" size="75" maxlength="75"
                                                                                                  value="<?php echo $street; ?>"/></p>
                                </td>
                            </tr> 
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        City:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" name="city" size="25" maxlength="25" value="<?php echo $city; ?>" /></p>
                                </td>
                            </tr> 
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        State:</p></td>
                                <td class="Right">
                                    <p><select name="state" class="selectBox">
                                                    <!-- <option value="md">MD</option>
                                                    <option value="va">VA</option>
                                                    <option value="wv">WV</option> -->
                                                    <?php
                                                    echo $db->getList('rf_state', 'state_cd', 'state_descr', $state);
                                                    ?>
                                                </select></p>
                                </td>
                            </tr> 							
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Zip:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" id="zip" name="zip" value="<?php echo $zip; ?>"
                                                                                      /></p>
                                </td>
                            </tr> 
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Phone Number(s)</p></td>
                                <td class="Right">
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Work:</p></td>
                                <td class="Right">
                                    <p><input type="text" id="work" name="work" class="width320" value="<?php echo $work; ?>"
                                                                                    size="15" maxlength="15" /></p>
                                </td>
                            </tr> 
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Cell:</p></td>
                                <td class="Right">
                                    <p><input type="text" id="cell" name="cell" class="width320" value="<?php echo $cell; ?>"
                                                                                   size="15" maxlength="15"/></p>
                                </td>
                            </tr> 							
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Email:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="email" class="width320" size="75" maxlength="75"
                                                                                                    value="<?php echo $email; ?>"
                                                                                                    /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Notification Preference:</p></td>
                                <td class="Right">
                                    <p><?php
                                                if ($row['NOTIFICATION_PRE'] == 'E') {
                                                    echo '&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;<input type="radio" id="notifypref" checked="true" name="notifypref" value="E">';
                                                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text<input type="radio" id="notifypref" name="notifypref" value="T">';
                                                } elseif ($row['NOTIFICATION_PRE'] == 'T') {
                                                    echo '&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;<input type="radio" id="notifypref" name="notifypref" value="E">';
                                                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text<input type="radio" checked="true" id="notifypref" name="notifypref" value="T">';
                                                } else {
                                                    echo '&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;<input type="radio" id="notifypref" name="notifypref" value="E">';
                                                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text<input type="radio" id="notifypref" name="notifypref" value="T">';
                                                }
                                                ?></p>
                                </td>
                            </tr>
	<tr class="textBoxTable">
                                <td colspan="2" style="float:left;margin-left:220px;">
                                    <input type="submit" name="action" value="Close" style="background-color: #3a6a8e;border-radius:5px;height: 35px; width: 100px"/>
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
        if ($_POST['action'] == 'Save') {
            $lastname = $_POST['lastname'];
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
            $middlename1 = $_POST['middlename'];



            $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }

            mysql_select_db($_SESSION['databaseName'], $con);

            $result = mysql_query("SELECT * FROM  patient WHERE account_id = '$account_id'");
            $num_rows = mysql_num_rows($result);

            if ($num_rows == 0) {
  mysql_query("INSERT INTO patient (patient_id,account_id,last_name,first_name,email_address, middle_name ,ADDR_street1 ,ADDR_CITY , WORK_PHONE , CELL_PHONE , ZIP_CD)
	VALUES (0,'$account_id','$lastname','$firstname','$email' , '$middlename1','$street' , '$city', '$work1' ,'$cell1', '$zip1')");
            } else {

                mysql_query("update patient set last_name='$lastname',first_name='$firstname',email_address='$email' , WORK_PHONE='$work1'
                        , middle_name='$middlename1' , ADDR_street1='$street' , ADDR_CITY='$city' , ZIP_CD='$zip1' , CELL_PHONE='$cell1' WHERE account_id = '$account_id' ");
            }




            $nextpage = 'patientprofile.php?msg=update';
        } else if ($_POST['action'] == 'Close')
            $nextpage = 'maind.php';
    }
   
    header("location:" . $nextpage);
    exit;
}
?>