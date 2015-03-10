<?php

require_once( 'default-view.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Student_Info_Payment_View extends Default_View {

	public function get_output() {
		$globals_path = $this->model->get_globals_path();
		$globals_url  = $this->model->get_globals_url();
		$template_uri = $this->model->get_template_uri();
		$bill_to_address_country = $this->model->get_bill_to_address_country();
		$bill_to_address_state = $this->model->get_bill_to_address_state();
		$currency = $this->model->get_currency();
		$cybersource_access_key = $this->model->get_cybersource_access_key();
		$cybersource_locale = $this->model->get_cybersource_locale();
		$cybersource_profile_id = $this->model->get_cybersource_profile_id();
		$form_post_url = $this->model->get_form_post_url();
		$item_0_name = $this->model->get_item_0_name();
		$item_0_quantity = $this->model->get_item_0_quantity();
		$item_0_unit_price = $this->model->get_item_0_unit_price();
		$line_item_count = $this->model->get_line_item_count();
		$reference_number = $this->model->get_reference_number();
		$signature = $this->model->get_signature();
		$signed_date_time = $this->model->get_signed_date_time();
		$signed_field_names = $this->model->get_signed_field_names();
		$transaction_type = $this->model->get_transaction_type();
		$transaction_uuid = $this->model->get_transaction_uuid();
		$unsigned_field_names = $this->model->get_unsigned_field_names();
		require_once( $template_uri );
	}
}
