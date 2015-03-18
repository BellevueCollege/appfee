<?php

require_once( 'default-model.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Cybersource_Payment_Model extends Default_Model {

	public $bill_to_address_country;
	public $bill_to_address_state;
	public $currency;
	public $customer_ip_address;
	public $cybersource_access_key;
	public $cybersource_locale;
	public $cybersource_profile_id;
	public $cybersource_secret_key;
	public $cybersource_signed_fields_to_variables_map;
	public $database_connection;
	public $database_table;
	public $form_post_url;
	public $item_0_name;
	public $item_0_quantity;
	public $item_0_unit_price;
	public $line_item_count;
	public $program_of_study;
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
		$database_dsn,
		$database_username,
		$database_password,
		$database_table,
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

		$this->database_connection = new PDO(
			$database_dsn,
			$database_username,
			$database_password
		);

		$this->cybersource_signed_fields_to_variables_map = array(
			'access_key' => &$this->cybersource_access_key,
			'bill_to_address_country' => &$this->bill_to_address_country,
			'bill_to_address_state' => &$this->bill_to_address_state,
			'bill_to_forename' => &$this->student_first_name,
			'bill_to_surname' => &$this->student_last_name,
			'currency' => &$this->currency,
			'customer_ip_address' => &$this->customer_ip_address,
			'item_0_name' => &$this->item_0_name,
			'item_0_quantity' => &$this->item_0_quantity,
			'item_0_unit_price' => &$this->item_0_unit_price,
			'line_item_count' => &$this->line_item_count,
			'locale' => &$this->cybersource_locale,
			'merchant_defined_data1' => &$this->student_first_name,
			'merchant_defined_data2' => &$this->student_last_name,
			'merchant_defined_data3' => &$this->student_middle_name,
			'merchant_defined_data4' => &$this->student_date_of_birth,
			'merchant_defined_data5' => &$this->program_of_study,
			'profile_id' => &$this->cybersource_profile_id,
			'reference_number' => &$this->reference_number,
			'signed_date_time' => &$this->signed_date_time,
			'signed_field_names' => &$this->signed_field_names,
			'transaction_type' => &$this->transaction_type,
			'transaction_uuid' => &$this->transaction_uuid,
			'unsigned_field_names' => &$this->unsigned_field_names,
		);

		$this->bill_to_address_country = $bill_to_address_country;
		$this->bill_to_address_state = $bill_to_address_state;
		$this->currency = $currency;
		$this->customer_ip_address = $this->get_customer_ip_address();
		$this->cybersource_access_key = $cybersource_access_key;
		$this->cybersource_locale = $cybersource_locale;
		$this->cybersource_profile_id = $cybersource_profile_id;
		$this->cybersource_secret_key = $cybersource_secret_key;
		$this->database_table = $database_table;
		$this->form_post_url = $form_post_url;
		$this->item_0_name = $item_0_name;
		$this->item_0_quantity = $item_0_quantity;
		$this->item_0_unit_price = $item_0_unit_price;
		$this->line_item_count = '1';
		$this->signed_field_names = implode(
			',',
			array_keys( $this->cybersource_signed_fields_to_variables_map )
		);
		$this->transaction_type = $transaction_type;
		$this->transaction_uuid = uniqid();
		$this->unsigned_field_names = '';
	}

	public function get_bill_to_address_country() {
		return $this->bill_to_address_country;
	}

	public function get_bill_to_address_state() {
		return $this->bill_to_address_state;
	}

	public function get_customer_ip_address() {
		return $_SERVER['REMOTE_ADDR'];
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

	public function get_program_of_study() {
		return $this->program_of_study;
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

	public function save_data() {
		$tsql = 'INSERT INTO ' . $this->database_table . ' '
			. 'OUTPUT INSERTED.ReferenceNumber '
			. 'VALUES ('
				. ':first_name, '
				. ':last_name, '
				. ':middle_name, '
				. ':date_of_birth, '
				. ':amount, '
				. ':program_of_study, '
				. ':time_stamp'
			. ');'
		;
		$query = $this->database_connection->prepare( $tsql );

		$values = array(
			':first_name'       => $this->student_first_name,
			':last_name'        => $this->student_last_name,
			':middle_name'      => $this->student_middle_name,
			':date_of_birth'    => $this->student_date_of_birth,
			':amount'           => $this->item_0_unit_price,
			':program_of_study' => $this->program_of_study,
			':time_stamp'       => date( 'Y-m-d\TH:i:s' ),
		);

		$query->execute( $values );
		$result_array = $query->fetch();
		if ( ! isset( $result_array['ReferenceNumber'] )
			|| ! ctype_digit( $result_array['ReferenceNumber'] )
		) {
			$error_message =
				'Invalid reference number received from the database'
			;
			throw new Exception( $error_message );
		}
		$this->reference_number = $result_array['ReferenceNumber'];
	}

	public function set_program_of_study( $program_of_study ) {
		$this->program_of_study = $program_of_study;
	}

	public function set_signature() {
		$this->set_signed_date_time();
		$data_to_sign = array();
		foreach ( $this->cybersource_signed_fields_to_variables_map
			as $field => $value
		) {
			$data_to_sign[] = "$field=$value";
		}
		$data_to_sign_string = implode( ',', $data_to_sign );
		$hash = hash_hmac(
			'sha256',
			$data_to_sign_string,
			$this->cybersource_secret_key,
			true
		);
		$this->signature = base64_encode( $hash );
	}

	public function set_signed_date_time() {
		$this->signed_date_time = gmdate( 'Y-m-d\TH:i:s\Z' );
		return $this->signed_date_time;
	}

	public function set_student_date_of_birth( $student_date_of_birth ) {
		$this->student_date_of_birth = $student_date_of_birth;
	}

	public function set_student_first_name( $student_first_name ) {
		$this->student_first_name = $student_first_name;
	}

	public function set_student_last_name( $student_last_name ) {
		$this->student_last_name = $student_last_name;
	}

	public function set_student_middle_name( $student_middle_name ) {
		$this->student_middle_name = $student_middle_name;
	}
}
