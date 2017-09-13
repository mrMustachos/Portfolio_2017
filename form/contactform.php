<?PHP
/*
	Contact Form from HTML Form Guide
	This program is free software published under the
	terms of the GNU Lesser General Public License.
	See this page for more info:
	http://www.html-form-guide.com/contact-form/simple-php-contact-form.html
*/

require_once("include/fgcontactform.php");
require_once("include/simple-captcha.php");

$formproc = new FGContactForm();
$sim_captcha = new FGSimpleCaptcha('scaptcha');

$formproc->EnableCaptcha($sim_captcha);


//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('billdomanick@gmail.com'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('oZoheg0GwYR2PWv');


if(isset($_POST['submitted'])) {
	if($formproc->ProcessForm()) {
		$formproc->RedirectToURL("thank-you.php");
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="robots" content="noindex, nofollow" />

	<title>Contact Form - Domanick Design</title>
	<link rel="shortcut icon" type="image/x-icon" href="../dist/images/favicon/favicon.ico" />
	
	<!-- Apple Icons -->
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="../dist/images/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="../dist/images/favicon/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../dist/images/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="../dist/images/favicon/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../dist/images/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="../dist/images/favicon/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../dist/images/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="../dist/images/favicon/apple-touch-icon-152x152.png" />
	<link rel="apple-touch-icon-precomposed" sizes="180x180" href="../dist/images/favicon/apple-touch-icon-180x180.png">

	<!-- Standard Icons -->
	<link rel="icon" type="image/png" href="../dist/images/favicon/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="../dist/images/favicon/favicon-128x128.png" sizes="128x128" />
	<link rel="icon" type="image/png" href="../dist/images/favicon/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="../dist/images/favicon/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="../dist/images/favicon/favicon-16x16.png" sizes="16x16" />

	<!-- Microsoft Metadata -->
	<meta name="application-name" content="Domanick Design"/>
	<link rel="manifest" href="../dist/images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#D81B77" />
	<meta name="msapplication-TileImage" content="../dist/images/favicon/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="../dist/images/favicon/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="../dist/images/favicon/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="../dist/images/favicon/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="../dist/images/favicon/mstile-310x310.png" />

	<!-- Chrome Theme Color -->
	<meta name="theme-color" content="#00ACE6">

	<!-- <link rel="stylesheet" type="text/css" href="contact.css" /> -->
	<!-- <script type='text/javascript' src='scripts/gen_validatorv31.js'></script> -->
	<link rel="stylesheet" type="text/css" href="../dist/css/style.css">
	<script src="../dist/js/formScript.min.js"></script>
</head>
<body class="form">
	<form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
		<div class="grid">
			<div class="row">
				<div class="col left-m-8-of-8 col-6-of-6">
					<input type='hidden' name='submitted' id='submitted' value='1' />
					<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>' />
					<input type='text' class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />
					<span class='error hidden'><?php echo $formproc->GetErrorMessage(); ?></span>
				</div>
			</div>

			<div class="row container">
				<div class="col left-m-8-of-8 col-6-of-6 input">
					<input class="input__field" type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay(' name ') ?>' maxlength="50" />
					<label class="input__label" for='name'>
						<span class="input__label-content">Name</span>
					</label>
					<span id='contactus_name_errorloc' class='error'></span>
				</div>
			</div>

			<div class="row container">
				<div class="col left-m-8-of-8 col-6-of-6 input">
					<input class="input__field" type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay(' email ') ?>' maxlength="50" />
					<label class="input__label" for='email'>
						<span class="input__label-content">Email</span>
					</label>
					<span id='contactus_email_errorloc' class='error'></span>
				</div>
			</div>

			<div class="row container">
				<div class="col left-m-8-of-8 col-6-of-6 input textarea">
					<textarea class="input__field" rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
					<label class="input__label" for='message'>
						<span class="input__label-content">Message</span>
					</label>
					<span id='contactus_message_errorloc' class='error textarea'></span>
				</div>
			</div>

			<div class="row container" id="antispam">
				<div class="col col-m-3-of-8 col-6-of-6 scaptcha_col">
					<div class="scaptcha_title">Anti-Spam Question:</div>
				</div>
				<div class="col col-m-5-of-8 col-6-of-6 input scaptcha">
					<input class="input__field" type='text' name='scaptcha' id='scaptcha' maxlength="10" />
					<label class="input__label" for='scaptcha'>
						<span class="input__label-content"><?php echo $sim_captcha->GetSimpleCaptcha(); ?></span>
					</label>
					<span id='contactus_scaptcha_errorloc' class='error'></span>
				</div>
			</div>

			<div class="row container btn">
				<div class="col left-m-3-of-8 col-6-of-6">
					<input class="submit" type='submit' name='Submit' value='Submit' />
				</div>
			</div>

		</div>
	</form>

	<!-- client-side Form Validations: Uses the excellent form validation script from JavaScript-coder.com -->
	<script type='text/javascript'>
		// <![CDATA[
		var frmvalidator = new Validator("contactus");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		frmvalidator.addValidation("name", "req", "Please provide your name");
		frmvalidator.addValidation("email", "req", "Please provide your email address");
		frmvalidator.addValidation("email", "email", "Please provide a valid email address");
		frmvalidator.addValidation("message", "req", "Write me something nice please");
		frmvalidator.addValidation("message", "maxlen=2048", "The message is too long!(more than 2KB!)");
		frmvalidator.addValidation("scaptcha", "req", "Please answer the anti-spam question");
		// ]]>
	</script>
</body>
</html>