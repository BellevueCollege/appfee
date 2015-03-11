<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>CyberSource Payment (CHANGE ME)</title>
</head>
<body>
	<form class="form-horizontal" id="payment_confirmation" action="<?php echo $form_post_url ?>" method="post">
		<input type="hidden" id="access_key" name="access_key" value="<?php echo $cybersource_access_key ?>" />
		<input type="hidden" id="bill_to_address_country" name="bill_to_address_country" value="<?php echo $bill_to_address_country ?>" />
		<input type="hidden" id="bill_to_address_state" name="bill_to_address_state" value="<?php echo $bill_to_address_state ?>" />
		<input type="hidden" id="currency" name="currency" value="<?php echo $currency ?>" />
		<input type="hidden" id="item_0_name" name="item_0_name" value="<?php echo $item_0_name ?>" />
		<input type="hidden" id="item_0_quantity" name="item_0_quantity" value="<?php echo $item_0_quantity ?>" />
		<input type="hidden" id="item_0_unit_price" name="item_0_unit_price" value="<?php echo $item_0_unit_price ?>" />
		<input type="hidden" id="line_item_count" name="line_item_count" value="<?php echo $line_item_count ?>" />
		<input type="hidden" id="locale" name="locale" value="<?php echo $cybersource_locale ?>" />
		<input type="hidden" id="merchant_defined_data1" name="merchant_defined_data1" value="<?php echo $student_first_name ?>" />
		<input type="hidden" id="merchant_defined_data2" name="merchant_defined_data2" value="<?php echo $student_last_name ?>" />
		<input type="hidden" id="merchant_defined_data3" name="merchant_defined_data3" value="<?php echo $student_middle_name ?>" />
		<input type="hidden" id="merchant_defined_data4" name="merchant_defined_data4" value="<?php echo $student_date_of_birth ?>" />
		<input type="hidden" id="profile_id" name="profile_id" value="<?php echo $cybersource_profile_id ?>" />
		<input type="hidden" id="reference_number" name="reference_number" value="<?php echo $reference_number ?>" />
		<input type="hidden" id="signed_date_time" name="signed_date_time" value="<?php echo $signed_date_time ?>" />
		<input type="hidden" id="signed_field_names" name="signed_field_names" value="<?php echo $signed_field_names ?>" />
		<input type="hidden" id="transaction_type" name="transaction_type" value="<?php echo $transaction_type ?>" />
		<input type="hidden" id="transaction_uuid" name="transaction_uuid" value="<?php echo $transaction_uuid ?>" />
		<input type="hidden" id="unsigned_field_names" name="unsigned_field_names" value="<?php echo $unsigned_field_names ?>" />
		<input type="hidden" id="signature" name="signature" value="<?php echo $signature ?>" />
		<button type="submit" id="submit" class="btn btn-primary">Pay Now</button>
	</form>
</body>
</html>
