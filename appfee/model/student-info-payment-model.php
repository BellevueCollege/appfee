<?php

require_once( 'default-model.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Student_Info_Payment_Model extends Default_Model {

	public $bill_to_address_country;
	public $bill_to_address_state;
	public $currency;
	public $cybersource_access_key;
	public $cybersource_locale;
	public $cybersource_profile_id;
	public $cybersource_secret_key;
	public $form_post_url;
	public $item_0_name;
	public $item_0_quantity;
	public $item_0_unit_price;
	public $line_item_count;
	public $reference_number;
	public $signature;
	public $signed_date_time;
	public $signed_field_names;
	public $transaction_type;
	public $transaction_uuid;
	public $unsigned_field_names;

	public function __construct(
		$template_uri,
		$globals_path,
		$globals_url,
		$bill_to_address_country,
		$bill_to_address_state,
		$currency,
		$cybersource_access_key,
		$cybersource_locale,
		$cybersource_profile_id,
		$cybersource_secret_key,
		$form_post_url,
		$item_0_name,
		$item_0_quantity,
		$item_0_unit_price,
		$transaction_type
	) {
		$this->bill_to_address_country = $bill_to_address_country;
		$this->bill_to_address_state = $bill_to_address_state;
		$this->currency = $currency;
		$this->cybersource_access_key = $cybersource_access_key;
		$this->cybersource_locale = $cybersource_locale;
		$this->cybersource_profile_id = $cybersource_profile_id;
		$this->cybersource_secret_key = $cybersource_secret_key;
		$this->form_post_url = $form_post_url;
		$this->globals_path = $globals_path;
		$this->globals_url = $globals_url;
		$this->item_0_name = $item_0_name;
		$this->item_0_quantity = $item_0_quantity;
		$this->item_0_unit_price = $item_0_unit_price;
		$this->line_item_count = '1';
		$this->reference_number = microtime( true );
		$this->signed_field_names = 'access_key,' .
			'bill_to_address_country,' .
			'bill_to_address_state,' .
			'currency,' .
			'item_0_name,' .
			'item_0_quantity,' .
			'item_0_unit_price,' .
			'line_item_count,' .
			'locale,' .
			'profile_id,' .
			'signed_field_names,' .
			'transaction_type,' .
			'unsigned_field_names,' .
			'reference_number,' .
			'signed_date_time,' .
			'transaction_uuid'
		;
		$this->template_uri = $template_uri;
		$this->transaction_type = $transaction_type;
		$this->transaction_uuid = uniqid();
		$this->unsigned_field_names = 'merchant_defined_data1,' .
			'merchant_defined_data2' .
			'merchant_defined_data3' .
			'merchant_secure_data1'
		;
	}

	public function get_bill_to_address_country() {
		return $this->bill_to_address_country;
	}

	public function get_bill_to_address_state() {
		return $this->bill_to_address_state;
	}

	public function get_currency() {
		return $this->currency;
	}

	public function get_cybersource_access_key() {
		return $this->cybersource_access_key;
	}

	public function get_cybersource_locale() {
		return $this->cybersource_locale;
	}

	public function get_cybersource_profile_id() {
		return $this->cybersource_profile_id;
	}

	public function get_form_post_url() {
		return $this->form_post_url;
	}

	public function get_item_0_name() {
		return $this->item_0_name;
	}

	public function get_item_0_quantity() {
		return $this->item_0_quantity;
	}

	public function get_item_0_unit_price() {
		return $this->item_0_unit_price;
	}

	public function get_line_item_count() {
		return $this->line_item_count;
	}

	public function get_reference_number() {
		return $this->reference_number;
	}

	public function get_transaction_type() {
		return $this->transaction_type;
	}

	public function get_transaction_uuid() {
		return $this->transaction_uuid;
	}

	public function get_signed_date_time() {
		return $this->signed_date_time;
	}

	public function get_signature() {
		return $this->signature;
	}

	public function get_signed_field_names() {
		return $this->signed_field_names;
	}

	public function get_unsigned_field_names() {
		return $this->unsigned_field_names;
	}
}
