<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-US" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-US" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-US">
<!--<![endif]-->

<head>
	<title>Pay Application Fee @ Bellevue College</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo $globals_url ?>c/g.css">
	<link rel="stylesheet" media="print" href="<?php echo $globals_url ?>c/p.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script type="text/javascript" src="<?php echo $globals_url ?>j/ghead.js"></script>
	<!--[if lt IE 9]><script type="text/javascript" src="/<?php echo $globals_url ?>j/respond.js"></script><![endif]-->
	<link rel='stylesheet' id='open-sans-css' href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.0.1' type='text/css' media='all' />
	<?php include( $globals_path . 'h/gabranded.html' ); ?>
</head>

<body class="nav-enrollment">
	<?php include( $globals_path . 'h/bhead.html' ); ?>
	<div id="main-wrap" class="globals-branded">
		<div id="main" class="container no-padding">
			<div class="row">
				<div class="col-md-12">
					<div class="box-shadow" id="content">
						<div class="row row-padding">
							<div class="content-padding">
								<p class="entry-title">&nbsp;</p>
								<h1>Pay Application Fee</h1>
								<p class="lead">Thank you for your application to Bellevue College! Please provide the information below so that we can link your payment to your application. Required fields marked with *</p>
								<form class="form-horizontal" id="payment_confirmation" action="<?php echo $form_post_url ?>" method="post">
									<input type="hidden" id="form_url" name="form_url" value="<?php echo $current_url  ?>" />
									<div class="form-group">
										<label for="first_name" class="col-sm-3 control-label">Student First Name:*</label>
										<div class="col-sm-8">
											<input type="text" maxlength="32" class="form-control" id="first_name" name="first_name" aria-required="true" required />
										</div>
									</div>
									<div class="form-group">
										<label for="middle_name" class="col-sm-3 control-label">Student Middle Name:</label>
										<div class="col-sm-5">
											<input type="text" maxlength="16" class="form-control" id="middle_name" name="middle_name" />
										</div>
										<div class="col-sm-3 checkbox">
											<label>
												<input id="no_middle_name" type="checkbox"> No Middle Name
											</label>
										</div>
									</div>
									<div class="form-group">
										<label for="last_name" class="col-sm-3 control-label">Student Last Name:*</label>
										<div class="col-sm-8">
											<input type="text" maxlength="32" class="form-control" id="last_name" name="last_name" aria-required="true" required />
										</div>
									</div>
									<div class="form-group">
										<label for="date_of_birth" class="col-sm-3 control-label">Student Date of Birth:*</label>
										<div class="col-sm-4">
											<input type="text" maxlength="10" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="mm/dd/yyyy" aria-required="true" aria-describedby="dob_help_block" required />
											<p id="dob_help_block" class="sr-only help-block">Enter your Date of Birth in MM/DD/YYYY format</p>
										</div>
									</div>
                                                                        <div class="form-group">
										<label for="yrq" class="col-sm-3 control-label">Which Year Quarter are you applying for?:*</label>
										<div class="col-sm-4">
                                                                                    <select class="form-control" id="yrq" name="yrq"  aria-required="true" aria-describedby="dob_help_block" required >
                                                                                         <?php //var_dump($active_yrq_options);
                                                                                            for($i=0;$i<count($active_yrq_options);$i++)
                                                                                            {
                                                                                                $yrq_id = $active_yrq_options[$i]['YearQuarterID'];
                                                                                                $yrq_title = $active_yrq_options[$i]['Title'];
                                                                                        ?>
                                                                                            <option value="<?php echo $yrq_id ;?>"><?php echo $yrq_title ;?></option>
                                                                                        <?php
                                                                                            }
                                                                                          ?>
                                                                                        
                                                                                    </select>
											
										</div>
									</div>
                                                                       
									<label for="no_fill" class="sr-only" aria-hidden="true">If you are human, leave this field blank!</label>
									<input type="text" maxlength="10" class="sr-only" id="no_fill" name="no_fill" aria-hidden="true" tabindex="-1" />
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<button type="submit" id="submit" class="btn btn-primary">Continue</button>
										</div>
									</div>
								</form>
								<!--	End Form	-->
								<small class="pull-right">Application Fee <?php echo VERSION_NUMBER ?></small>
							</div>
							<!--.content-padding-->
						</div>
						<!--.row-padding-->
					</div>
					<!-- #content-->
				</div>
				<!-- row -->
			</div>
			<!-- col-md-12 -->
		</div>
		<!-- #main .container -->
	</div>
	<!-- #main-wrap -->

	<?php include( $globals_path . 'h/bfoot.html'); ?>
	<?php include( $globals_path . 'h/legal.html' ); ?>


	<script src="<?php echo $globals_url ?>j/bootstrap.min.js"></script>
	<script src="<?php echo $globals_url ?>j/g.js"></script>
	<!-- jQuery Validate -->
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

	<!-- moment.js (for date validation) -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			/*	Date of Birth Validation -- Middle-Endian. Date of birth must be after 1900	*/
			$.validator.addMethod('dobME', function (value, element) {
				/*	Check against regex to see if date format is valid and date > 1899	*/
				var isValid = value.match(/^(0?[1-9]|1[0-2])\/(0?[1-9]|[1-2][0-9]|3[0-1])\/((19|[2-9][0-9])[0-9]{2})$/);
				/*	Store date of birth	*/
				var dob = moment(value, "M-D-YYYY");
				/*	If element passes regex and passes moment date validation, check if date is in future	*/
				if (isValid && dob.isValid()) {
					var today = new moment(today);
					if (dob >= today) {
						isValid = false;
					}
					return isValid;
				}
			}, 'Please enter a valid date of birth in MM/DD/YYYY format');

			/* Name validation supporting letters, '_- and space */
			$.validator.addMethod('validName', function (value, element) {
				return this.optional(element) || /^[a-z\-_'\s]+$/i.test(value);
			}, 'Name can only include capital and small letters, single quote, hyphen, and underline');
			/*  Validate Form   */
			$('#payment_confirmation').validate({
				rules: {
					first_name: {
						required: true,
						validName: true
					},
					last_name: {
						required: true,
						validName: true
					},

					middle_name: {
						required: '#no_middle_name:unchecked',
						validName: true
					},

					date_of_birth: {
						required: true,
						dobME: true
					}
				},
				messages: {
					first_name: {
						required: 'First Name is Required',
						validName: 'First Name can only include capital and small letters, single quote, hyphen, and underline'
					},
					last_name: {
						required: 'Last Name is Required',
						validName: 'Last Name can only include capital and small letters, single quote, hyphen, and underline'
					},
					middle_name: {
						required: 'Please Provide your Middle Name or Check \"No Middle Name\"',
						validName: 'Middle Name can only include capital and small letters, single quote, hyphen, and underline'
					},
					date_of_birth: {
						required: 'Date of Birth is Required',
						dobME: 'Date of Birth must be in MM/DD/YYYY format'
					}
				},

				/* Apply bootstrap 3 error display classes  */
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				unhighlight: function (element) {
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				},
				errorElement: 'span',
				errorClass: 'help-block',
				errorPlacement: function (error, element) {
					if (element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					} else {
						error.insertAfter(element);
					}
				}
			});
		});

		// Functions to allow Middle Name toggle
		function checkAllowBlank(should_disable, field_id) {
			if (!field_id.attr('disabled') && should_disable.prop('checked')) {
				field_id.attr('disabled', true);
			} else {
				field_id.attr('disabled', false);
			}
		};

		function fieldContentCheck(text_element, toggle_element) {
			if (text_element.val()) {
				toggle_element.parent().hide();
			} else {
				toggle_element.parent().show();
			}
		};

		// Check Field Status when things change
		$('#no_middle_name').change(function () {
			checkAllowBlank($(this), $('#middle_name'))
			$('#middle_name').valid();
		});

		$('#middle_name').keyup(function () {
			fieldContentCheck($(this), $('#no_middle_name'))
		});
	</script>
</body>

</html>
