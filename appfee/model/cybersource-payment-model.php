<?php

require_once( 'default-model.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Cybersource_Payment_Model extends Default_Model {

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
	public $student_date_of_birth;
	public $student_first_name;
	public $student_last_name;
	public $student_middle_name;
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
		parent::__construct( $template_uri, $globals_path, $globals_url );

		$this->bill_to_address_country = $bill_to_address_country;
		$this->bill_to_address_state = $bill_to_address_state;
		$this->currency = $currency;
		$this->cybersource_access_key = $cybersource_access_key;
		$this->cybersource_locale = $cybersource_locale;
		$this->cybersource_profile_id = $cybersource_profile_id;
		$this->cybersource_secret_key = $cybersource_secret_key;
		$this->form_post_url = $form_post_url;
		$this->item_0_name = $item_0_name;
		$this->item_0_quantity = $item_0_quantity;
		$this->item_0_unit_price = $item_0_unit_price;
		$this->line_item_count = '1';
		$this->reference_number = microtime( true );
		$this->signed_field_names =
			'access_key,' .
			'bill_to_address_country,' .
			'bill_to_address_state,' .
			'bill_to_forename,' .
			'bill_to_surname,' .
			'currency,' .
			'item_0_name,' .
			'item_0_quantity,' .
			'item_0_unit_price,' .
			'line_item_count,' .
			'locale,' .
			'merchant_defined_data1,' .
			'merchant_defined_data2,' .
			'merchant_defined_data3,' .
			'merchant_defined_data4,' .
			'profile_id,' .
			'reference_number,' .
			'signed_date_time,' .
			'signed_field_names,' .
			'transaction_type,' .
			'transaction_uuid,' .
			'unsigned_field_names'
		;
		$this->transaction_type = $transaction_type;
		$this->transaction_uuid = uniqid();
		$this->unsigned_field_names = '';

		$this->generate_signature();
	}

	public function generate_signature() {
		$this->generate_signed_date_time();

		$data_to_sign = array(
			'access_key=' . $this->cybersource_access_key,
			'bill_to_address_country=' . $this->bill_to_address_country,
			'bill_to_address_state=' . $this->bill_to_address_state,
			'bill_to_forename=' . $this->student_first_name,
			'bill_to_surname=' . $this->student_last_name,
			'currency=' . $this->currency,
			'item_0_name=' . $this->item_0_name,
			'item_0_quantity=' . $this->item_0_quantity,
			'item_0_unit_price=' . $this->item_0_unit_price,
			'line_item_count=' . $this->line_item_count,
			'locale=' . $this->cybersource_locale,
			'merchant_defined_data1=' . $this->student_first_name,
			'merchant_defined_data2=' . $this->student_last_name,
			'merchant_defined_data3=' . $this->student_middle_name,
			'merchant_defined_data4=' . $this->student_date_of_birth,
			'profile_id=' . $this->cybersource_profile_id,
			'reference_number=' . $this->reference_number,
			'signed_date_time=' . $this->signed_date_time,
			'signed_field_names=' . $this->signed_field_names,
			'transaction_type=' . $this->transaction_type,
			'transaction_uuid=' . $this->transaction_uuid,
			'unsigned_field_names=' . $this->unsigned_field_names,
		);

		$data_to_sign_string = implode( ',', $data_to_sign );
		$hash = hash_hmac(
			'sha256',
			$data_to_sign_string,
			$this->cybersource_secret_key,
			true
		);
		$this->signature = base64_encode( $hash );
	}

	public function generate_signed_date_time() {
		$this->signed_date_time = gmdate( 'Y-m-d\TH:i:s\Z' );
		return $this->signed_date_time;
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

	public function get_student_date_of_birth() {
		return $this->student_date_of_birth;
	}

	public function get_student_first_name() {
		return $this->student_first_name;
	}

	public function get_student_last_name() {
		return $this->student_last_name;
	}

	public function get_student_middle_name() {
		return $this->student_middle_name;
	}

	public function get_unsigned_field_names() {
		return $this->unsigned_field_names;
	}
}
