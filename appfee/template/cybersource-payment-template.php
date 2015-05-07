<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-US" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-US" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-US">
<!--<![endif]-->

<head>
	<title>Proceed to Payment @ Bellevue College</title>
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
					<div id="content" class="box-shadow">
						<div class="row row-padding">
							<p class='entry-title'>&nbsp;</p>
							<div class="content-padding">
								<h1>Proceed to Payment</h1>
								<form class="form-horizontal" id="payment_confirmation" name="payment_confirmation" action="<?php echo $form_post_url ?>" method="post">
									<input type="hidden" id="access_key" name="access_key" value="<?php echo $cybersource_access_key ?>" />
									<input type="hidden" id="bill_to_address_country" name="bill_to_address_country" value="<?php echo $bill_to_address_country ?>" />
									<input type="hidden" id="bill_to_address_state" name="bill_to_address_state" value="<?php echo $bill_to_address_state ?>" />
									<input type="hidden" id="currency" name="currency" value="<?php echo $currency ?>" />
									<input type="hidden" id="customer_ip_address" name="customer_ip_address" value="<?php echo $customer_ip_address ?>" />
									<input type="hidden" id="item_0_name" name="item_0_name" value="<?php echo $item_0_name ?>" />
									<input type="hidden" id="item_0_quantity" name="item_0_quantity" value="<?php echo $item_0_quantity ?>" />
									<input type="hidden" id="item_0_unit_price" name="item_0_unit_price" value="<?php echo $item_0_unit_price ?>" />
									<input type="hidden" id="line_item_count" name="line_item_count" value="<?php echo $line_item_count ?>" />
									<input type="hidden" id="locale" name="locale" value="<?php echo $cybersource_locale ?>" />
									<input type="hidden" id="merchant_defined_data1" name="merchant_defined_data1" value="<?php echo $student_first_name ?>" />
									<input type="hidden" id="merchant_defined_data2" name="merchant_defined_data2" value="<?php echo $student_last_name ?>" />
									<input type="hidden" id="merchant_defined_data3" name="merchant_defined_data3" value="<?php echo $student_middle_name ?>" />
									<input type="hidden" id="merchant_defined_data4" name="merchant_defined_data4" value="<?php echo $student_date_of_birth ?>" />
									<input type="hidden" id="merchant_defined_data5" name="merchant_defined_data5" value="<?php echo $program_of_study ?>" />
									<input type="hidden" id="profile_id" name="profile_id" value="<?php echo $cybersource_profile_id ?>" />
									<input type="hidden" id="reference_number" name="reference_number" value="<?php echo $reference_number ?>" />
									<input type="hidden" id="signed_date_time" name="signed_date_time" value="<?php echo $signed_date_time ?>" />
									<input type="hidden" id="signed_field_names" name="signed_field_names" value="<?php echo $signed_field_names ?>" />
									<input type="hidden" id="transaction_type" name="transaction_type" value="<?php echo $transaction_type ?>" />
									<input type="hidden" id="transaction_uuid" name="transaction_uuid" value="<?php echo $transaction_uuid ?>" />
									<input type="hidden" id="unsigned_field_names" name="unsigned_field_names" value="<?php echo $unsigned_field_names ?>" />
									<input type="hidden" id="signature" name="signature" value="<?php echo $signature ?>" />
									<p class="lead">Thank you <?php echo $student_first_name ?>! Please review our payment policy below, then continue to payment.
									<h2>Payment Policy</h2>
									<p>The $34.00 college admissions fee is generally not refundable unless it is determined that either the payment was made in error; the applicant is not eligible for admissions (e.g. under-age); or an appeal is granted through the college’s appeals process.  If the payment is made in error or an appeal is granted, a refund will be processed within thirty (30) days of that determination.</p>
									&nbsp;
									<div class="row">
										<div class="col-sm-3">
											<input type="button" class="btn btn-link pull-right" value="Go Back" onclick="history.back(-1)" />
										</div>
										<div class="col-sm-8">
											<button type="submit" id="submit_btn" class="btn btn-success">Continue to Payment</button>
										</div>
									</div>

								</form>
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
	<?php include( $globals_path . 'h/legal.html'); ?>

	<script src="<?php echo $globals_url ?>j/bootstrap.min.js"></script>
	<script src="<?php echo $globals_url ?>j/g.js"></script>

</body>

</html>
