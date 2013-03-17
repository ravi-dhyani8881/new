<?php
require_once '../includes/global.inc.php';

if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
    include( "header.php");
    ?>
    <script type="text/javascript">
        jQuery(function($){   
            $("#zip").mask("?99999-9999"); 
            $("#cell").mask("(999) 999-9999");
            $("#work").mask("(999) 999-9999? x99999");      
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

        <td style="background-color:white;height:600px;width:300px;vertical-align:middle;">

            <?php
            include( "navigationo.php");



            $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);

            if (!$con) {

                die('Could not connect: ' . mysql_error());
            }



            mysql_select_db($_SESSION['databaseName'], $con);

            $account_id = $_SESSION['org_account_id'];


            $resultOrg = mysql_query("SELECT ORG_NAME ,WEBSITE_URL , ORG_EMAIL FROM  organization WHERE ACCOUNT_ID = '$account_id'");
            $rowOrg = mysql_fetch_assoc($resultOrg);

            $org_name = $rowOrg['ORG_NAME'];

            $web_url = $rowOrg['WEBSITE_URL'];

            $email = $rowOrg['ORG_EMAIL'];

            $result = mysql_query("SELECT addr_street1,addr_city,addr_state,zip_cd,work_phone,cell_phone  FROM  address WHERE address_id = '$account_id'");

            $row = mysql_fetch_assoc($result);

            $street = $row['addr_street1'];

            $city = $row['addr_city'];

            $state = $row['addr_state'];

            $zip = $row['zip_cd'];

            $work = $row['work_phone'];

            $cell = $row['cell_phone'];
            ?>

        </td>

        <td style="background-color:white;height:600px;width:900px;text-align:top;">
<table style="margin: 40px 50px 40px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td >

                                    <span class="left-box"></span><span class="cent-box" style="width:758px;">Organization Profile Information</span><span class="right-box"></span>

                                </td></tr>

                <tr><td>

                <!--<input type="hidden" name="account_id" value="<?php echo $_SESSION['org_account_id']; ?>"/>

                        -->



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
                                        Organization Name:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="orgname" value="<?php echo $org_name; ?>" size="35" class="width320" maxlength="35" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        WebSite Url:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="website" value="<?php echo $web_url; ?>" class="width320" size="35" maxlength="35" /></p>
                                </td>
                            </tr>
                            <!--
                            
                            <td style="width:10%">
                            
                            First Name:
                            
                            </td> <td style="width:40%"><input type="text" name="firstname"
                            
                            size="35" maxlength="35"/>
                            
                            </td>
                            
                            
                            
                            </tr>
                            
                            
                            
                            <tr><td style="width:10%">
                            
                            Middle Name:</td><td style="width:40%;"> <input type="text" name="middlename"
                            
                            size="35" maxlength="35" />
                            
                            </td>
                            
                            </tr>
                            
                            <tr>
                            
                            
                            
                            <td style="width:10%">
                            
                            Gender: </td><td colspan="3" style="width:90%">Female&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="f">
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male<input type="radio" name="gender" value="m">
                            
                            </td>
                            
                            </tr>
                            
                            
                            
                            -->
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
                                    <p><input type="text" name="street" value="<?php echo $street; ?>" class="width320" size="75" maxlength="75" /></p>
                                </td>
                            </tr>
							<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        City:</p></td>
                                <td class="Right">
                                    <p><input type="text" value="<?php echo $city; ?>" class="width320" name="city" size="75" maxlength="75"/></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        State:</p></td>
                                <td class="Right">
                                    <p><select name="state" class="selectBox">
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
                                    <p><input type="text" value="<?php echo $zip; ?>" name="zip" class="width320" id="zip" size="75" maxlength="75" /></p>
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
                                                                                    size="30" maxlength="30" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Cell:</p></td>
                                <td class="Right">
                                    <p><input type="text" id="cell" class="width320" name="cell" value="<?php echo $cell; ?>"
                                                                                   size="30" maxlength="30"/></p>
                                </td>
                            </tr>
							<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Email:</p></td>
                                <td class="Right">
                                    <p><input type="text" class="width320" name="email" size="75" maxlength="75" value="<?php echo $email; ?>" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Notification Preference:</p></td>
                                <td class="Right">
                                    <p>Email&nbsp;&nbsp;&nbsp;<input type="radio" name="notifypref" value="email">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text<input type="radio" name="notifypref" value="text"></p>
                                </td>
                            </tr>

                <!-- <tr>

                <td colspan="4" style="width:100%">

                <p class="bold">

                Phone Number(s)

                </p>

                </td>

                </tr>

                -->
<tr class="textBoxTable">
                                <td colspan="2" style="float:left;margin-left:220px;">
                                    <input type="submit" name="action" value="Save" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
									<input type="submit" name="action" value="Close" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px;margin-left:20px;"/>
                                </td></tr>							
                        </table>

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

        if ($_POST['action'] == 'Save') {



            $account_id = $_SESSION['org_account_id'];

            $orgname = $_POST['orgname'];

            $web_url = $_POST['website'];

            $email = $_POST['email'];



            $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);

            if (!$con) {

                die('Could not connect: ' . mysql_error());
            }



            mysql_select_db($_SESSION['databaseName'], $con);

            $result = mysql_query("SELECT * FROM  organization WHERE account_id = '$account_id'");
            $num_rows = mysql_num_rows($result);

            if ($num_rows == 0) {
                mysql_query("INSERT INTO organization (org_id, account_id, org_name , WEBSITE_URL , ORG_EMAIL) VALUES (0,'$account_id','$orgname' , '$web_url' ,'$email' )");
            } else {

                mysql_query("update organization set org_id='0', account_id='$account_id', org_name='$orgname' , WEBSITE_URL='$web_url' , ORG_EMAIL='$email'  WHERE account_id = '$account_id' ");
            }


            $street = $_POST['street'];

            $city = $_POST['city'];

            $state = $_POST['state'];

            $zipOrg = $_POST['zip'];

            $work = $_POST['work'];

            $cell = $_POST['cell'];

            //$work=$_POST['work'];
            //$cell=$_POST['cell'];


            $resultnew = mysql_query("SELECT * from address  WHERE ADDRESS_ID  = '$account_id'");
            $num_rowsnew = mysql_num_rows($resultnew);

            if ($num_rowsnew == 0) {
                mysql_query("INSERT INTO address (address_id,addr_street1,addr_street2,addr_street3,addr_city,addr_state,zip_cd,work_phone,cell_phone)
					VALUES ('$account_id','$street','','','$city','$state','$zipOrg','$work','$cell')");
            } else {

                mysql_query("update address set addr_street1='$street' , addr_city='$city' , zip_cd='$zipOrg' , work_phone='$work' , cell_phone='$cell'    WHERE ADDRESS_ID = '$account_id' ");
            }
            mysql_close($con);
            $nextpage = 'organizationprofile.php?msg=update';
        } else if ($_POST['action'] == 'Close')
            $nextpage = 'organizationprofile.php';
    }

    header("location:" . $nextpage);
    exit;
}
?>