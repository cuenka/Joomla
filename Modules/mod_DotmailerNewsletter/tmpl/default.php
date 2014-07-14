<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<?php if (($params->get('header', NULL))!=NULL): ?>	
	<?php echo "<p class='headerNewsletter'>".$params->get('header', NULL)."</p>"; ?>
<?php endif; ?>	

<!-- Start of signup -->
<script language="javascript">
<!--
function validate_signup(frm) {
	var emailAddress = frm.Email.value;
	var errorString = '';
	if (emailAddress == '' || emailAddress.indexOf('@') == -1) {
		errorString = 'Please enter your email address';
	}

    

	var isError = false;
    if (errorString.length > 0)
        isError = true;

    if (isError)
        alert(errorString);
	return !isError;
}


//-->
</script>

<form name="signup" id="signup" action="http://dmtrk.net/signup.ashx" method="post" 
onsubmit="return validate_signup(this)" 
style="padding: 10px;background-color:<?php echo $params->get('backgroundcolour'); ?>;
	color:<?php echo $params->get('fontcolour'); ?>;">
<input type="hidden" name="addressbookid" value="<?php echo $params->get('addressbookid', 'default'); ?>">
<!-- UserID - required field, do not remove -->
<input type="hidden" name="userid" value="<?php echo $params->get('userid', 'default'); ?>">
<!-- ReturnURL - when the user hits submit, they'll get sent here -->
<input type="hidden" name="ReturnURL" value="<?php echo $params->get('thankyoupage', 'default'); ?>">
<!-- Email - the user's email address -->
<table>
<tr>
<td>
Email</td><td><input type="text" name="Email"></td></tr>
<?php if ($params->get('date', 'default')): ?>	
	<tr><td>DATE</td><td><input class="text" type="text" name="cd_DATE"/></td></tr>
<?php endif; ?>	
<?php if ($params->get('firstname', 'default')): ?>	
	<tr><td>FIRST NAME</td><td><input class="text" type="text" name="cd_FIRSTNAME"/></td></tr>
<?php endif; ?>	
<?php if ($params->get('fullname', 'default')): ?>	
	<tr><td>FULL NAME</td><td><input class="text" type="text" name="cd_FULLNAME"/></td></tr>
<?php endif; ?>	
<?php if ($params->get('gender', 'default')): ?>	
	<tr><td>GENDER</td><td><input class="text" type="text" name="cd_GENDER"/></td></tr>
<?php endif; ?>	
<?php if ($params->get('lastname', 'default')): ?>	
	<tr><td>LAST NAME</td><td><input class="text" type="text" name="cd_LASTNAME"/></td></tr>
<?php endif; ?>	
<?php if ($params->get('postcode', 'default')): ?>	
	<tr><td>POST CODE</td><td><input class="text" type="text" name="cd_POSTCODE"/></td></tr>
<?php endif; ?>	
</table>

<input type="Submit" name="Submit" value="Subscribe">


</form>
<!-- End of signup -->