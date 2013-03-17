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

<td style="background-color:white;height:600px;width:900px;text-align:top;">
<table style="margin: 40px 50px 40px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td >

                                    <span class="left-box"></span><span class="cent-box" style="width:758px;">Insurance Information</span><span class="right-box"></span>

                                </td></tr>

                <tr><td>

<table class="main" style="width:100%">
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Insurance Holder:</p></td>
                                <td class="Right">
                                    <p>Self&nbsp;&nbsp;&nbsp;<input type="radio" name="insuranceholder" value="self">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other<input type="radio" name="insuranceholder" value="other"></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Last Name:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="lastname" class="width320"

size="35" maxlength="35" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        First Name:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="firstname" class="width320"

size="35" maxlength="35"/></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Relationship:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="relationship" class="width320"

size="35" maxlength="35" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p class="bold">
                                        Primary Insurance:</p></td>
                                <td class="Right">
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Employer Name:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="employername" size="75" maxlength="75" class="width320"

/></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Insurance Company Name:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="insurancename" size="75" maxlength="75" class="width320"/></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Group Id:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="groupid" size="75" maxlength="75" class="width320" /></p>
                                </td>
                            </tr>

							<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Insurance Id:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="insuranceid" size="75" maxlength="75" class="width320" /></p>
                                </td>
                            </tr>
<tr class="textBoxTable"><td class="Left">
                                    <p>
                                        Zip:</p></td>
                                <td class="Right">
                                    <p><input type="text" name="zip" class="width320"/></p>
                                </td>
                            </tr>
<tr class="textBoxTable">
                                <td colspan="2" style="float:left;margin-left:220px;">
                                    <input type="submit" name="action" value="Save" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
									<input type="submit" name="action" value="Cancel" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px;margin-left:20px;"/>
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



	if(isset($_POST['action']))

	{

		if( $_POST['action']=='Save')

			$nextpage='mainp.php';

		else if( $_POST['action']=='Cancel')

			$nextpage='mainp.php';



	}

	header("location:".$nextpage);

	exit;

}

?>