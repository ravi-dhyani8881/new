<?php require_once '../includes/global.inc.php'; ?>
<?php
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
    include( "header.php");
    $dbConf = new DB();
    $_SESSION['databaseURL'] = $dbConf->get_db_host();
    $_SESSION['databaseUName'] = $dbConf->get_db_user();
    $_SESSION['databasePWord'] = $dbConf->get_db_pass();
    $_SESSION['databaseName'] = $dbConf->get_db_name();
    ?>
    <tr>
    <script type="text/javascript">
        $(document).ready(function() {            		
            $('#fsubmit').click(function() {            			
                var username = $('#username').val();
                if (username == ""){ alert("Please Insert Username"); $("#username").css("border","1px solid red"); return false; }            			
                var password = $('#password').val();
                if (password == ""){ alert("Please Insert Password"); $("#password").css("border","1px solid red"); return false; }
            })                    
            var watermarkUser = 'Enter your user name';
            var watermarkPassword = 'Enter your password';                    
            $('#username').val(watermarkUser).addClass('watermark');
            $('#password').val(watermarkPassword).addClass('watermark');                    
            $('#username').blur(function(){
                if ($(this).val().length == 0){
                    $(this).val(watermarkUser).addClass('watermark');
                }
            });
            $('#username').focus(function(){
                if ($(this).val() == watermarkUser){
                    $(this).val('').removeClass('watermark');
                }
            }); 
            $('#password').blur(function(){
                if ($(this).val().length == 0){
                    $(this).val(watermarkPassword).addClass('watermark');
                }
            });
            $('#password').focus(function(){
                if ($(this).val() == watermarkPassword){
                    $(this).val('').removeClass('watermark');
                }
            });	
        });
    </script>
    <td style="background-color:white;height:600px;width:1200px;text-align:top;">
        <table style="  display: block; left: 37%;   position: absolute;    top: 30%;    width: 390px;" cellpadding="0" cellspacing="0" >
            <tr>
                <td >
                    <table  style=" float: left;  margin-left: -3px;    width: 104%;">
                        <tr><td >

                                <span class="left-box"></span><span class="cent-box">Login Information</span><span class="right-box"></span>

                            </td></tr>
                    </table>
                </td>
            </tr>



            <tr><td style="text-align:left;vertical-align:top" >
                    <table class="main" style="width:100%; padding: 20px 10px 0 16px;">
                        <?php
                        if (isset($_REQUEST['error']) == 'invalid') {
                            echo '<tr><td style="width:10%">';
                            echo '</td>';
                            echo '<td style="width:40%;">';
                            echo '<p style="color:red; margin:13px 0 6px 12px;">Invalid User Name Password';
                            echo '</p>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>


                        <tr><td style="width:10%">
                                <p class="label">
                                    Username:</p></td>
                            <td style="width:40%;">
                                <p style="margin:13px 0 6px 12px;"><input type="text" name="login_id"
                                                                          size="35" maxlength="35" id="username" />
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:10%">
                                <p class="label">
                                    Password:
                                </p>
                            </td>
                            <td style="width:40%">
                                <p style="float:right; margin:0 0 5px;" class="forgot-pass"><a href="#">Forgot Password?</a></p>
                                <p>
                                    <input type="password" name="password"
                                           size="35" maxlength="35" id="password"/>
                                </p>
                            </td>
                        </tr>
                        <!--<tr>
                        <td colspan="4">
                        <p class="bold" id="accept">
                        Accept terms and conditions&nbsp;&nbsp;Yes<input type="radio" name="accept" value="Yes">
                        &nbsp;&nbsp;No<input type="radio" name="accept" value="No"></p>
                        </td>
                        </tr>
                        <tr>-->

                        <td colspan="4" style="width:100%; padding: 10px 0 7px;">
                            <div class="new-reg"><a href="register.php">New Registration</a></div>
                            <div style="
                                 margin-bottom: 10px;
                                 margin-left: 135px;">
                                <table style="width:100%;text-align:center;">
                                    <tr>
                                        <td style="width:30%" class="sub-bttn">
                                            <input type="submit" name="action" value="Login" style="background-color: #3a6a8e;border-radius:5px;height: 35px; width: 100px" id="fsubmit"/>

                                        </td>
                                        <td style="width:30%" class="sub-bttn">

                                            <input type="submit" name="action" value="Reset" style="background-color: #3a6a8e;border-radius:5px;height: 35px; width: 100px"/>

                                        </td>
                                    </tr>
                                </table></div>

                        </td></tr>


        </table>
        <!--<div align="center" style="margin-top:10px;"><img src="../resources/logo-form.png" alt="logo" border="0"/></div>-->

    </td></tr></table>
    </td>
    </tr>

    <?php include("footer.php"); ?>
    </table>

    </form>
    </body>
    </html>
    <?php } else {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'Login') {
            if (isset($_REQUEST["password"])) {
                $password = $_REQUEST["password"];
            }
            if (isset($_REQUEST["login_id"])) {
                $login = $_REQUEST["login_id"];
            }                
             $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db($_SESSION['databaseName'], $con);
            $result = mysql_query("SELECT ACCOUNT_ID ,ACCOUNT_TYPE , PASSWORD , login_id FROM  user_account WHERE login_id = '$login'");
            $count = mysql_num_rows($result);
            if ($count == 1) {
        while ($row = mysql_fetch_array($result)) {
            if ($login == $row['login_id'] && md5($password) == $row['PASSWORD']) {
                $account_type = $row['ACCOUNT_TYPE'];
                $account_id = $row['ACCOUNT_ID'];
                if ($account_type == 'staff') {
                    $result = mysql_query("SELECT staff_id FROM  org_staff WHERE account_id = '$account_id'");
                    $row = mysql_fetch_assoc($result);
                    $staff_id = $row['staff_id'];
                    $_SESSION['staff_id'] = $staff_id;
                    $_SESSION['staff_account_id'] = $account_id;
                    $_SESSION['login_type'] = 'staff';
                    $_SESSION['dlogin'] = 'login';
                    $_SESSION['llogin'] = 'true';
                   header("Location: doctorprofile.php");
                } else if ($account_type == 'patient') {
                    $result = mysql_query("SELECT patient_id FROM  patient WHERE account_id = '$account_id'");
                    $row = mysql_fetch_assoc($result);
                    $patient_id = $row['patient_id'];
                    $_SESSION['patient_id'] = $patient_id;
                    $_SESSION['patient_account_id'] = $account_id;
                    $_SESSION['login_type'] = 'patient';
                    $_SESSION['plogin'] = 'login';
                    $_SESSION['llogin'] = 'true';
                    header("Location: patientprofile.php");
                } else if ($account_type == 'organization') {
                    $_SESSION['org_account_id'] = $account_id;
                    $_SESSION['login_type'] = 'organization';
                    $_SESSION['staff_account_id'] = $account_id;
                    $_SESSION['ologin'] = 'login';
                    $_SESSION['llogin'] = 'true';
                    header("Location: organizationprofile.php");
                }
            } else {
                header("Location: login.php?error=invalid");
            }
        }
    } else {
        header("Location: login.php?error=invalid");
    }    
    }   
}
}
?>