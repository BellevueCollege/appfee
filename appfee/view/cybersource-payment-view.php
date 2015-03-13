<?php

require_once( 'default-view.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Cybersource_Payment_View extends Default_View {

	public function get_output() {
		$bill_to_address_country = $this->model->get_bill_to_address_country();
		$bill_to_address_state = $this->model->get_bill_to_address_state();
		$currency = $this->model->get_currency();
		$current_url = $this->model->get_current_url();
		$customer_ip_address = $this->model->get_customer_ip_address();
		$cybersource_access_key = $this->model->get_cybersource_access_key();
		$cybersource_locale = $this->model->get_cybersource_locale();
		$cybersource_profile_id = $this->model->get_cybersource_profile_id();
		$errors = $this->model->get_errors();
		$form_post_url = $this->model->get_form_post_url();
		$globals_path = $this->model->get_globals_path();
		$globals_url  = $this->model->get_globals_url();
		$item_0_name = $this->model->get_item_0_name();
		$item_0_quantity = $this->model->get_item_0_quantity();
		$item_0_unit_price = $this->model->get_item_0_unit_price();
		$line_item_count = $this->model->get_line_item_count();
		$reference_number = $this->model->get_reference_number();
		$redirect_url = $this->model->get_redirect_url();
		$signature = $this->model->get_signature();
		$signed_date_time = $this->model->get_signed_date_time();
		$signed_field_names = $this->model->get_signed_field_names();
		$student_date_of_birth = $this->model->get_student_date_of_birth();
		$student_first_name = $this->model->get_student_first_name();
		$student_last_name = $this->model->get_student_last_name();
		$student_middle_name = $this->model->get_student_middle_name();
		$template_uri = $this->model->get_template_uri();
		$transaction_type = $this->model->get_transaction_type();
		$transaction_uuid = $this->model->get_transaction_uuid();
		$unsigned_field_names = $this->model->get_unsigned_field_names();
		require_once( $template_uri );
	}
}
