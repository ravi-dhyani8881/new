<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
    include( "header.php");
    ?>

    <script type="text/javascript">
        $(document).ready(function() {
        			
            $('#fsubmit').click(function() {
        				
                var username = $('#username').val();
                var u=username.length;
                if (username == ""){ alert("Please Insert Username"); $("#username").css("border","1px solid red"); return false; }
                if (u <= 3 ){ alert("Username Must Be 4 Character"); $("#username").css("border","1px solid red"); return false; }
        				
                var pass1 = $('#pass1').val();
                var p=pass1.length;
                var pass2 = $('#pass2').val();
                if (pass1 == ""){ alert("Please Insert Password"); $("#pass1").css("border","1px solid red"); return false; }
                if (p <= 5){ alert("Password Must Be 6 Character"); $("#pass1").css("border","1px solid red"); return false; }
                if (pass2 == ""){ alert("Please Insert Password"); $("#pass2").css("border","1px solid red"); return false; }
                if (pass2 != pass1){ alert("Confirm Password Mismatch");$("#pass2").css("border","1px  solid red"); return false; }
        				
                var answer1 = $('#answer1').val();
                var answer2 = $('#answer2').val();
                var answer3 = $('#answer3').val();
        				
                if ( answer1=="" & answer2== "" & answer3==""){
        					
                    alert ("Please Insert One Secret Question");
                    return false;
                }
        				
                var accept = $('input:radio[name=accept]:checked').val();
                if (accept == "No"){ alert("Please Accept Terms And Conditions"); return false; }
        				
        			
            });
        			
        			
        			
            $("#username").keyup(function(){
                
                
                var username = $('#username').val();
                var u=username.length;		
                if (u >= 2 ){
                    $.post("jquerypost.php?id="+username, function(data) { 
        			
                        if (data==0){
                            $("#resultt" ).empty().append('<img src="../resources/1362269101_tick_circle.png" width="16" height="16" alt="1362269101_tick_circle"/>');                            
                            $('input[type="submit"]').removeAttr('disabled');
                        } else {
                            $("#resultt" ).empty().append('<img src="../resources/1362269132_Cancel__Red.png" width="24" height="24" alt="1362269132_Cancel__Red"/>');
                            $("#resultt").css("color","red");        					 
                            $('input[type="submit"]').attr('disabled','disabled');        					
                        }
        			
                    });
                }
        			
            });
        });

    </script>


    <tr>

        <td style="background-color:white;height:600px;width:1200px;text-align:top;">
            <table style="margin:40px 0 40px 235px;width:800px;height:100px" cellpadding="0px" cellspacing="0px;" >

                <tr>
                    <td >
                        <table width="56%" style="float: left;    margin-left: -3px;    width: 105%;">
                            <tr><td width="100%">

                                    <span class="left-box"></span><span class="cent-box" style="width:758px;">Registration Information</span><span class="right-box"></span>

                                </td></tr>
                        </table>
                    </td>
                </tr>
                <tr><td style="text-align:left;vertical-align:top" >
                        <table class="main" style="width:100%">

                            <tr><td class="Left">
                                    <p>
                                        Username:</p></td>
                                <td class="Right">
                                    <p><input class="width320" type="text" name="login_id" id="username" size="35" maxlength="35" />
									</p>
                                                                        <span id="resultt">
                                                                        </span>
                                </td>
                            </tr>
							<tr class="textBoxTable">
							<td class="Left">
                                    <p>
                                        Account Type:</p></td>
                                <td class="Right">
                                    <p>
                                       <select name="account_type" class="selectBox">
                                        <option value="patient">Patient</option>
                                        <option value="staff">Staff</option>
                                        <option value="organization">Organization</option>
                                    </select>
                                    </p>
                                </td>
							</tr>
							<tr class="textBoxTable">
							<td class="Left">
                                    <p>
                                        Password:</p></td>
                                <td class="Right">
                                    <p>
                                      <input class="width320" type="password" name="password" size="35" maxlength="35" id="pass1"/>
                                    </p>
                                </td>
							</tr>
							<tr class="textBoxTable">
							<td class="Left">
                                    <p>
                                        Confirm Password:</p></td>
                                <td class="Right">
                                    <p>
                                      <input type="password" class="width320" name="confirmpassword" size="35" maxlength="35" id="pass2"/>
                                    </p>
                                </td>
							</tr>
                            <tr class="textBoxTable">
							<td class="Left">
                                    <p>
                                        Secret Question 1:</p></td>
                                <td class="Right">
                                    <p>
                                      <select class="selectBox">
                                            <option value="Select Your Secret Question">Select Your Secret Question</option>
                                            <option value="What is the first name of your favorite uncle?">What is the first name of your favorite uncle?</option>
                                            <option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
                                            <option value="What is your oldest cousin's name?">What is your oldest cousin's name?</option>
                                            <option value="What is your youngest child's nickname?">What is your youngest child's nickname?</option>
                                            <option value="What is your oldest child's nickname?">What is your oldest child's nickname?</option>
                                            <option value="What is the first name of your oldest niece?">What is the first name of your oldest niece?</option>
                                            <option value="What is the first name of your oldest nephew?">What is the first name of your oldest nephew?</option>
                                            <option value="What is the first name of your favorite aunt?">What is the first name of your favorite aunt?</option>
                                            <option value="Where did you spend your honeymoon?">Where did you spend your honeymoon?</option>

                                        </select>
                                    </p>
                                </td>
							</tr>
							<tr class="textBoxTable">
							<td class="Left">
                                    <p>
                                        Answer 1:</p></td>
                                <td class="Right">
                                    <p>
                                      <input class="width320" type="text" name="answer_1" size="35" maxlength="35" id="answer1"/>
                                    </p>
                                </td>
							</tr>
                            <tr class="textBoxTable">
							<td class="Left">
                                    <p>
                                        Secret Question 2:</p></td>
                                <td class="Right">
                                    <p>
                                      <select class="selectBox">
                                            <option value="Select Your Secret Question">Select Your Secret Question</option>
                                            <option value="What is the first name of your favorite uncle?">What is the first name of your favorite uncle?</option>
                                            <option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
                                            <option value="What is your oldest cousin's name?">What is your oldest cousin's name?</option>
                                            <option value="What is your youngest child's nickname?">What is your youngest child's nickname?</option>
                                            <option value="What is your oldest child's nickname?">What is your oldest child's nickname?</option>
                                            <option value="What is the first name of your oldest niece?">What is the first name of your oldest niece?</option>
                                            <option value="What is the first name of your oldest nephew?">What is the first name of your oldest nephew?</option>
                                            <option value="What is the first name of your favorite aunt?">What is the first name of your favorite aunt?</option>
                                            <option value="Where did you spend your honeymoon?">Where did you spend your honeymoon?</option>

                                        </select>
                                    </p>
                                </td>
							</tr>
							<tr class="textBoxTable">
							<td class="Left">
                                    <p>
                                        Answer 2:</p></td>
                                <td class="Right">
                                    <p>
                                      <input class="width320" type="text" name="answer_2" size="35" maxlength="35" id="answer2"/>
                                    </p>
                                </td>
							</tr>
                            <tr class="textBoxTable">
							<td class="Left">
                                    <p>
                                        Secret Question 3:</p></td>
                                <td class="Right">
                                    <p>
                                      <select class="selectBox">
                                            <option value="Select Your Secret Question">Select Your Secret Question</option>
                                            <option value="What is the first name of your favorite uncle?">What is the first name of your favorite uncle?</option>
                                            <option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
                                            <option value="What is your oldest cousin's name?">What is your oldest cousin's name?</option>
                                            <option value="What is your youngest child's nickname?">What is your youngest child's nickname?</option>
                                            <option value="What is your oldest child's nickname?">What is your oldest child's nickname?</option>
                                            <option value="What is the first name of your oldest niece?">What is the first name of your oldest niece?</option>
                                            <option value="What is the first name of your oldest nephew?">What is the first name of your oldest nephew?</option>
                                            <option value="What is the first name of your favorite aunt?">What is the first name of your favorite aunt?</option>
                                            <option value="Where did you spend your honeymoon?">Where did you spend your honeymoon?</option>

                                        </select>
                                    </p>
                                </td>
							</tr>
							<tr class="textBoxTable">
							<td class="Left">
                                    <p>
                                        Answer 3:</p></td>
                                <td class="Right">
                                    <p>
                                      <input class="width320" type="text" name="answer_3" size="35" maxlength="35" id="answer3"/>
                                    </p>
                                </td>
							</tr>
							
                            <tr class="textBoxTable">
                                <td colspan="2"><p class="bold" id="accept" style="border:1px solid #CCC; padding:15px;width: 95%;margin-left:0;"> Accept terms and conditions&nbsp;&nbsp;Yes
                                        <input type="radio" name="accept" value="Yes" >
                                        &nbsp;&nbsp;No
                                        <input type="radio" name="accept" value="No" checked="checked">
                                        <br /><br />
                                        By proceeding, I agree to the Prijall Terms of Service, Prijall Privacy Pollcy and Communications Terms. To deliver product features, relevant advertising and abuse protection, Prijall's automated systems scan and analyse all email, IM, and other communications content.
                                    </p></td>
                            </tr>
                            <tr class="textBoxTable">
                                <td colspan="2" style="float:left;margin-left:220px;">
                                    <input type="submit" name="action" value="Register" id="fsubmit" style="background-color: #3a6a8e;border-radius:5px;height: 35px; width: 150px"/>
                                    <input value="Cancel" style="background-color: #3a6a8e;border-radius:5px;height: 35px; width: 140px; cursor:pointer; color: rgb(255, 255, 255);
                                                           text-align: center;
                                                           font-family: Arial,Helvetica,sans-serif;
                                                           font-size: 15px;
                                                           text-shadow: 0 1px 1px #2A4E69;margin-left:20px;" onclick="javascript:window.location = 'login.php'"/>
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

    $username = "";
    $password = "";
    $password_confirm = "";
    $email = "";
    $error = "";

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'Register') {
            $login_id = $_POST['login_id'];
            $password = md5($_POST['password']);
            $account_type = $_POST['account_type'];

            $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }

            mysql_select_db($_SESSION['databaseName'], $con);

            mysql_query("INSERT INTO user_account (account_id,account_type,login_id, password,challenge_q1,answer_1,challenge_q2,answer_2,challenge_q3,answer_3)
					VALUES (0,'$account_type','$login_id','$password','','','','','','')");


            $result = mysql_query("SELECT account_id FROM  user_account WHERE login_id = '$login_id'");
            $row = mysql_fetch_assoc($result);

            //	$_SESSION['account_id'] =$row['account_id'];
            mysql_close($con);
            if ($account_type == 'patient') {
                //$nextpage='patientprofile.php?account_id='.$row['account_id'];
                $_SESSION['patient_account_id'] = $row['account_id'];
                 $_SESSION['plogin'] = 'login';
                    $_SESSION['llogin'] = 'true';
                $nextpage = 'patientprofile.php';
            } else if ($account_type == 'staff') {
                //$nextpage='doctorprofile.php?account_id='.$row['account_id'];
                $_SESSION['staff_account_id'] = $row['account_id'];
                 $_SESSION['dlogin'] = 'login';
                    $_SESSION['llogin'] = 'true';
                $nextpage = 'doctorprofile.php';
            } else if ($account_type == 'organization') {
                $_SESSION['org_account_id'] = $row['account_id'];
                $_SESSION['ologin'] = 'login';
                    $_SESSION['llogin'] = 'true';
                $nextpage = 'organizationprofile.php';
            }
        } else if ($_POST['action'] == 'Cancel')
            $nextpage = 'login.php';
    }

    
    header("location:".$nextpage);
    exit;
}
?>