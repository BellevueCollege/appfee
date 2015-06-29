<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-US" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-US" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-US">
<!--<![endif]-->

<head>
	<title>Program of Study Declaration @ Bellevue College</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo $globals_url ?>c/g.css">
	<link rel="stylesheet" media="print" href="<?php echo $globals_url ?>c/p.css">
	<style type="text/css">
		/*  Page Specific Styles  */

		.conditional-group {
			display: none;
			border-left: 2px solid #000;
			padding-left: 2em;
			margin-left: 1em;
		}

		p.radio-heading {
			font-weight: bold;
		}
	</style>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script type="text/javascript" src="<?php echo $globals_url ?>j/ghead.js"></script>
	<!--[if lt IE 9]><script type="text/javascript" src="/<?php echo $globals_url ?>j/respond.js"></script><![endif]-->
	<link rel='stylesheet' id='open-sans-css' href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.0.1' type='text/css' media='all' />
	<?php include( $globals_path . 'h/gabranded.html' ); ?>
</head>

<body class="nav-enrollment">
	<?php require( $globals_path . 'h/bhead.html' ); ?>
	<div id="main-wrap" class="globals-branded">
		<div id="main" class="container no-padding">
			<div class="row">
				<div class="col-md-12">
					<div class="box-shadow" id="content">
						<div class="row row-padding">
							<div class="content-padding">
								<p class='entry-title'>&nbsp;</p>
								<h1>Program of Study Declaration</h1>
								<p class="lead">As a new student it is important to make an initial program declaration. Whether you plan to complete a certificate or degree, or are taking classes to fulfill other interests, the following brief questions will help you to do so. If you need to change or modify your selection at a later date, you can schedule an appointment with an academic or financial aid advisor.</p>

								<p>The college uses this information in various ways:</p>
								<ul>
									<li>This selection will affect the information your academic advisor and automated systems will use to help you choose your classes and track your progress toward degrees and certificates.</li>
									<li>The college must regularly report on enrollment and completion trends, which are especially important for accreditation and for some program funding needs.</li>
									<li>Federal law requires you to be enrolled in an eligible program of study to receive financial aid. If you haven't declared a degree or certificate program on your academic record, all financial aid awards will be put on hold until you choose your program of study. Please take special note of those programs with limited or no financial aid coverage which are indicated below.</li>
								</ul>
								<hr />
								<form id="student_intent" name="student_intent" action="<?php echo $form_post_url ?>" method="post">
									<input type="hidden" id="form_url" name="form_url" value="<?php echo $current_url  ?>" />
									<input type="hidden" id="first_name" name="first_name" value="<?php echo $student_first_name ?>" />
									<input type="hidden" id="last_name" name="last_name" value="<?php echo $student_last_name ?>" />
									<input type="hidden" id="middle_name" name="middle_name" value="<?php echo $student_middle_name ?>" />
									<input type="hidden" id="date_of_birth" name="date_of_birth" value="<?php echo $student_date_of_birth ?>" />
									<div class="row">
										<div class="col-sm-10 col-sm-offset-1 form-group">
											<p class="radio-heading" id="complete_degree_heading">Are you planning to complete a degree or certificate at Bellevue College?</p>
											<div class="input-container">
												<div class="radio">
													<label>
														<input type="radio" name="taking_degree" value="yes" aria-describedby="complete_degree_heading" required> Yes
													</label>
												</div>
												<!-- .radio -->

												<div class="conditional-group form-group">
													<p class="radio-heading" id="which_degree_heading">Which type?</p>
													<div class="input-container">
														<div class="radio">
															<label>
																<input type="radio" name="what_degree" id="what_degree_trans" value="TRANS" aria-describedby="which_degree_heading" required>Transfer Degree
															</label>
															<a tabindex="0" href="#" role="button" data-toggle="popover" data-html="true" data-trigger="focus" title="Transfer Degree" data-content="Our two-year transfer associate degrees are for students wishing to pursue a bachelor’s degree at a four year university. <a href='//www.bellevuecollege.edu/programs/degrees/transfer/' target='_blank'>More Transfer Degree information</a>."><span class="sr-only">More Information</span><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
														</div>
														<!-- .radio -->
													</div>
													<div class="input-container">
														<div class="radio">
															<label>
																<input type="radio" name="what_degree" id="what_degree_proftech" value="proftech" aria-describedby="which_degree_heading" aria-required="true" required> Professional Technical Degree or Certificate
															</label>
														</div>
														<!-- .radio -->

														<div class="conditional-group form-group" id="proftech_type">
															<label class="sr-only" for="proftech_type_selector">Select a Professional Technical Degree or Certificate:</label>
															<select class="form-control" id="proftech_type_selector" name="proftech_type" aria-required="true" required>
																<option value="" disabled selected>Select an option</option>
																<option value="505J">Accounting - 90 Credit AA Program </option>
																<option value="505K">Accounting - 97 Credit AAS-T Program </option>
																<option value="505D">Accounting: Accounting Assistant - 46 Credit Certificate Program </option>
																<option value="505B">Accounting: Accounting Information Systems - 20 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="505H">Accounting: Accounting Prep - 16 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="505C">Accounting: Bookkeeping - 31 Credit Certificate Program </option>
																<option value="505G">Accounting: Financial Data Report Specialist - 20 Credit Certificate Program </option>
																<option value="437">Alcohol &amp; Drug Counseling - 46 Credit Certificate Program </option>
																<option value="328">Allied Health - 90 Credit AAS-T Program </option>
																<option value="310B">Allied Health: Clinical Lab Assistant - 29 Credit Certificate Program </option>
																<option value="310C">Allied Health: Clinical Lab Assistant - 45 Credit Certificate Program </option>
																<option value="391A">Allied Health: Emergency Department Technician - 44 Credit Certificate Program </option>
																<option value="391C">Allied Health: Emergency Department Technician - 50 Credit Certificate Program </option>
																<option value="532D">Allied Health: Health Unit Coordinator - 50 Credit Certificate Program </option>
																<option value="310A">Allied Health: Healthcare Professions Basics - 19 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="312A">Allied Health: Medical Administrative Assistant - 49 Credit Certificate Program </option>
																<option value="382D">Allied Health: Phlebotomy Technician - 31 Credit Certificate Program </option>
																<option value="393C">Breast Ultrasound - 8 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="503F">Business Intelligence Analyst - 30 Credit Certificate Program </option>
																<option value="503E">Business Intelligence Developer - 45 Credit Certificate Program </option>
																<option value="502">Business Management - 90 Credit AA Program </option>
																<option value="502K">Business Management - 90 Credit AAS-T Program </option>
																<option value="254">Business Management: Entrepreneurship - 30 Credit Certificate Program </option>
																<option value="502B">Business Management: Project Management–General Business - 18-30 Credit Certificate Program </option>
																<option value="547E">Business Technology - 90-93 Credit AA Program </option>
																<option value="547A">Business Technology: Administrative Assistant - 48-50 Credit Certificate Program </option>
																<option value="518C">Business Technology: Advanced Business Software Specialist - 48 Credit Certificate Program </option>
																<option value="518E">Business Technology: Database User Specialist - 18-20 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="743C">Business Technology: Desktop Publishing for Print &amp; Web - 44 Credit Certificate Program </option>
																<option value="545C">Business Technology: Human Resources Assistant - 48 Credit Certificate Program </option>
																<option value="559F">Business Technology: Office Assistant - 24 Credit Certificate Program </option>
																<option value="518B">Business Technology: Software Specialist - 30-31 Credit Certificate Program </option>
																<option value="521F">Business Technology: Web Marketing Specialist - 58-60 Credit Certificate Program </option>
																<option value="521F">Certified Associate in Healthcare Information &amp; Management Systems - 15 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="832A">Criminal Justice - 90-91 Credit AA Program </option>
																<option value="358B">CT Imaging -26 Credit Certificate Program </option>
																<option value="393">Diagnostic Ultrasound Technology - 122 Credit AA Program </option>
																<option value="504E">Digital Media Arts - 90 Credit Certificate Program </option>
																<option value="524M">Digital Media: Advanced Video Production - 48 Credit Certificate Program </option>
																<option value="402">Early Childhood Education - 90 Credit AA Program </option>
																<option value="402D">Early Childhood Education - 94 Credit AAS-T Program </option>
																<option value="46E">Early Childhood: Early Childhood Ed - 47 Credit Certificate Program </option>
																<option value="41E">Early Childhood: Early Childhood Education General - 20 Credit Certificate Program </option>
																<option value="402E">Early Childhood: Infant &amp; Toddler Care - 21 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="42E">Early Childhood: Infant and Toddler Care - 20 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="40E">Early Childhood: Initial Certificate Childcare - 12 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="333A">Neurodiagnostic Technology - 103 Credit AA Program </option>
																<option value="2500">General Studies Non-Transfer Degree (Limited or No Financial Aid) </option>
																<option value="529E">Healthcare Informatics - 18 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="521A">Healthcare Information Technology - 45 Credit Certificate Program </option>
																<option value="515V">Information Systems - 91 Credit AAS-T Program </option>
																<option value="515X">Information Systems - Database Administration - 91 Credit AAS-T Program </option>
																<option value="515Y">Information Systems - Software Developer - 91 Credit AAS-T Program </option>
																<option value="527N">Information Systems: Cloud Technologies - 10 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="503K">Information Systems: Database Administration Assistant - 40 Credit Certificate Program </option>
																<option value="503L">Information Systems: Database Analyst - 30 Credit Certificate Program </option>
																<option value="503M">Information Systems: Database Report Developer - 45 Credit Certificate Program </option>
																<option value="515E">Information Systems: Intermediate Applications Developer - 30 Credit Certificate Program </option>
																<option value="515F">Information Systems: Introductory .NET Programming - 45 Credit Certificate Program </option>
																<option value="515D">Information Systems: Introductory C++ Programming - 20 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="527M">Information Systems: Mobile Technologies - 10 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="515M">Information Systems: Programming for Web Development - 45 Credit Certificate Program </option>
																<option value="734A">Interior Studies - 97 Credit AA Program </option>
																<option value="438C">Interpretation - 24 Credit Certificate Program </option>
																<option value="358C">Magnetic Resonance Imaging - 26 Credit Certificate Program </option>
																<option value="245">Marketing Management - 90 Credit AA Program </option>
																<option value="298A">Marketing: Retail Management - 50 Credit Certificate Program </option>
																<option value="245A">Marketing: Sales &amp; Marketing - 30 Credit Certificate Program </option>
																<option value="245B">Marketing: Sales &amp; Marketing - 50 Credit Certificate Program </option>
																<option value="678">Molecular Science Technician AAS-T </option>
																<option value="527J">Network Services &amp; Computing Systems-Application Support - 94 Credit AA Program </option>
																<option value="527L">Network Services &amp; Computing Systems-Network Administration - 91 Credit AA Program </option>
																<option value="527K">Network Services &amp; Computing Systems-Operating Systems Administration - 94 Credit AA Program </option>
																<option value="527R">Network Services and Computing Systems - Network Administration - 91 Credit AAS-T Program </option>
																<option value="527Q">Network Services and Computing Systems - Operating System - 91 Credit AAS-T Program </option>
																<option value="527D">Network: Cisco Support Technician - 46 Credit Certificate Program </option>
																<option value="509A">Network: Microcomputer Support Specialist - 45 Credit Certificate Program </option>
																<option value="527E">Network: Microsoft Network Support–IT - 45 Credit Certificate Program </option>
																<option value="527P">Network: Network Services &amp; Computing Systems - 94 Credit AAS-T Program </option>
																<option value="509C">Network: Operating Systems Support Specialist - 45 Credit Certificate Program </option>
																<option value="357A">Nuclear Medicine Technology - 93 Credit AA Program </option>
																<option value="323T">Nursing - 116-117 Credit AAS-T Program </option>
																<option value="329B">Nursing Assistant–Certified - 7 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="887">Occupational and Life Skills - 90 Credit AOLS Program 887</option>
																<option value="346">Personal Fitness Trainer - 19 Credit Certificate Program (Limited or No Financial Aid) </option>
																<option value="357B">Positron Emission Tomography - 24 Credit Certificate Program </option>
																<option value="353">Radiation Therapy - 119 Credit AA Program </option>
																<option value="354">Radiologic Technology - 101 Credit AA Program </option>
																<option value="509F">Technical Assistant - 24 Credit Certificate Program </option>
																<option value="438D">Translation - 24 Credit Certificate Program </option>
																<option value="358D">Vascular Interventional Program - 24 Credit Certificate Program </option>
																<option value="169D">Wilderness Skills - 18 Credit Certificate Program (Limited or No Financial Aid) </option>
															</select>
														</div>
														<!-- .conditional-group #proftech_type -->
													</div>
													<!-- .input-container -->
												</div>
												<!-- .conditional-group -->
											</div>
											<!-- .input-container -->
											<div class="input-container">
												<div class="radio">
													<label>
														<input type="radio" name="taking_degree" id="taking_degree_no" value="no" aria-describedby="complete_degree_heading" aria-required="true" required> No
													</label>
												</div>
												<div class="conditional-group form-group">
													<p class="radio-heading" id="no_degree_heading">What are you planning to pursue?</p>
													<div class="radio">
														<label>
															<input type="radio" name="no_degree" id="no_degree_preq" value="PREQ" aria-describedby="no_degree_heading" aria-required="true" required> Taking Prerequisites
														</label>
														<a tabindex="0" href="#" role="button" data-toggle="popover" data-html="true" data-trigger="focus" title="Taking Prerequisites" data-content="A prerequisite is a course or set of courses that must be completed or a skill that must be demonstrated before you can enroll in a more advanced course, whether at Bellevue College or elsewhere."><span class="sr-only">More Information</span><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>

													</div>
													<div class="radio">
														<label>
															<input type="radio" name="no_degree" id="no_degree_pers" value="PERS" aria-describedby="no_degree_heading" aria-required="true" required> Classes for Personal Interest/Development
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="no_degree" id="no_degree_undc" value="UNDC" aria-describedby="no_degree_heading" aria-required="true" required> Undecided
														</label>
													</div>
												</div>
												<!-- .conditional-group -->
											</div>
										</div>
										<!-- .col -->
									</div>
									<!-- .row -->
									<label for="no_fill" class="sr-only" aria-hidden="true">If you are human, leave this field blank!</label>
									<input type="text" maxlength="10" class="sr-only" id="no_fill" name="no_fill" aria-hidden="true" tabindex="-1" />
									<div class="row">
										<div class="col-sm-3">
											<input type="button" class="btn btn-link pull-right" value="Go Back" onclick="history.back(-1)" />
										</div>
										<div class="col-sm-8">
											<button type="submit" id="submit_btn" class="btn btn-success">Continue</button>
										</div>
									</div>
							</div>
							<!-- .row -->
							&nbsp;
							</form>
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

	<?php include( $globals_path . 'h/bfoot.html' ); ?>
	<?php include( $globals_path . 'h/legal.html' ); ?>

	<script src="<?php echo $globals_url ?>j/bootstrap.min.js"></script>
	<script src="<?php echo $globals_url ?>j/g.js"></script>

	<!-- jQuery Validate -->
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

	<script type="text/javascript">
		jQuery.extend(jQuery.validator.messages, {
			required: 'Please Select an Option'
		});
		$(document).ready(function () {

			// Ensure elements are shown if the page is visited when elements are already checked
			$('input:checked').closest('.input-container').children('.conditional-group').slideDown();

			$('input').change(function () {

				// Store DOM elements in variables to avoid calling DOM more than needed
				var closest_input_container = $(this).closest('.input-container');
				var other_input_containers = closest_input_container.siblings('.input-container');

				// Hide previously selected options
				other_input_containers.find('.conditional-group').slideUp();

				// Unselect options in previously selected groups
				other_input_containers.find('input[type="radio"]').prop('checked', false);
				other_input_containers.find('select').prop('selectedIndex', 0);

				//Show available options
				closest_input_container.children('.conditional-group').slideDown();

			});

			// Validate Form
			$('#student_intent').validate({

				// Apply bootstrap 3 error display classes
				highlight: function (element) {
					$(element).closest('.form-group').addClass('has-error');
				},
				unhighlight: function (element) {
					$(element).closest('.form-group').removeClass('has-error');
				},

				errorElement: 'span',
				errorClass: 'help-block',
				errorPlacement: function (error, element) {
					if (element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					} else if (element.parent('.radio')) {
						error.appendTo(element.closest('.form-group'));
					} else {
						error.insertAfter(element);
					}
				}
			});
		});

		// Initialize Popover functionality in Bootstrap
		$(function () {
			$('[data-toggle="popover"]').popover()
		})
	</script>
</body>

</html>
