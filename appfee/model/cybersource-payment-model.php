<?php
/*
 * AppFee, College Admissions Processor
 * Copyright (C) 2015 Bellevue College
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

/**
 * CyberSource payment model class file
 *
 * This file contains the Cybersource_Payment_Model class that extends the name
 * and date of birth model.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage Model
 * @since 1.0.0
 */

/**
 * Load the the name and date of birth model class.
 */
require_once( 'name-dob-model.php' );

/**
 * Defines the CyberSource payment model
 *
 * This class defines the model to be used to submit CyberSource payment.
 *
 * @since 1.0.0
 */
class Cybersource_Payment_Model extends Name_DOB_Model {

	/**
	 * CyberSource access key.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $access_key;

	/**
	 * Billing address country.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $bill_to_address_country;

	/**
	 * Billing address state.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $bill_to_address_state;

	/**
	 * Type of currency.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $currency;

	/**
	 * Customer IP address.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $customer_ip_address;

	/**
	 * A PDO Object.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var PDO
	 */
	protected $database_connection;

	/**
	 * Item 0's name (description).
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $item_0_name;

	/**
	 * Item 0's quantity.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $item_0_quantity;

	/**
	 * Item 0's unit price.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $item_0_unit_price;

	/**
	 * Total count of all line items.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $line_item_count;

	/**
	 * CyberSource supported locale (language).
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $locale;

	/**
	 * CyberSource profile id.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $profile_id;

	/**
	 * CyberSource secret key.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $secret_key;

	/**
	 * Array map of CyberSource field name keys to class property variable
	 * values.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var array $args {
	 *     @type string $access_key maps to {@see Cybersource_Payment_Model::$access_key}
	 *     @type string $bill_to_address_country maps to {@see Cybersource_Payment_Model::$bill_to_address_country}
	 *     @type string $bill_to_address_state maps to {@see Cybersource_Payment_Model::$bill_to_address_state}
	 *     @type string $bill_to_forename maps to {@see Name_DOB_Model::$first_name}
	 *     @type string $bill_to_surname maps to {@see Name_DOB_Model::$last_name}
	 *     @type string $currency maps to {@see Cybersource_Payment_Model::$currency}
	 *     @type string $customer_ip_address maps to {@see Cybersource_Payment_Model::$customer_ip_address}
	 *     @type string $item_0_name maps to {@see Cybersource_Payment_Model::$item_0_name}
	 *     @type string $item_0_quantity maps to {@see Cybersource_Payment_Model::$item_0_quantity}
	 *     @type string $item_0_unit_price maps to {@see Cybersource_Payment_Model::$item_0_unit_price}
	 *     @type string $line_item_count maps to {@see Cybersource_Payment_Model::$line_item_count}
	 *     @type string $locale maps to {@see Cybersource_Payment_Model::$locale}
	 *     @type string $merchant_defined_data1 maps to {@see Name_DOB_Model::$first_name}
	 *     @type string $merchant_defined_data2 maps to {@see Name_DOB_Model::$last_name}
	 *     @type string $merchant_defined_data3 maps to {@see Name_DOB_Model::$middle_name}
	 *     @type string $merchant_defined_data4 maps to {@see Name_DOB_Model::$date_of_birth}
	 *     @type string $merchant_defined_data5 maps to {@see Cybersource_Payment_Model::$program_of_study}
	 *     @type string $profile_id maps to {@see Cybersource_Payment_Model::$profile_id}
	 *     @type string $reference_number maps to {@see Cybersource_Payment_Model::$reference_number}
	 *     @type string $signed_date_time maps to {@see Cybersource_Payment_Model::$signed_date_time}
	 *     @type string $signed_field_names maps to {@see Cybersource_Payment_Model::$signed_field_names}
	 *     @type string $transaction_type maps to {@see Cybersource_Payment_Model::$transaction_type}
	 *     @type string $transaction_uuid maps to {@see Cybersource_Payment_Model::$transaction_uuid}
	 *     @type string $unsigned_field_names maps to {@see Cybersource_Payment_Model::$unsigned_field_names}
	 * }
	 */
	protected $signed_fields_to_variables_map;

	/**
	 * Student's program of study code.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $program_of_study;

	/**
	 * Reference number (order number).
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $reference_number;

	/**
	 * CyberSource verifiable signature for data.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $signature;

	/**
	 * Date and time the signature was generated.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $signed_date_time;

	/**
	 * Common separated list of all signed field names.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $signed_field_names;

	/**
	 * Transaction type CyberSource should use.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $transaction_type;

	/**
	 * An unique ID for the CyberSource transaction.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $transaction_uuid;

	/**
	 * Common separated list of all field names that are not signed.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $unsigned_field_names;

	/**
	 * CyberSource payment model constructor.
	 *
	 * Populates some class properties from the constructor parameters.
	 *
	 * @since 1.0.0
	 *
	 * @see Cybersource_Payment_Model::$access_key
	 * @see Cybersource_Payment_Model::$bill_to_address_country
	 * @see Cybersource_Payment_Model::$bill_to_address_state
	 * @see Cybersource_Payment_Model::$currency
	 * @see Cybersource_Payment_Model::$customer_ip_address
	 * @see Cybersource_Payment_Model::$database_connection
	 * @see Cybersource_Payment_Model::$item_0_name
	 * @see Cybersource_Payment_Model::$item_0_quantity
	 * @see Cybersource_Payment_Model::$item_0_unit_price
	 * @see Cybersource_Payment_Model::$line_item_count
	 * @see Cybersource_Payment_Model::$locale
	 * @see Cybersource_Payment_Model::$profile_id
	 * @see Cybersource_Payment_Model::$secret_key
	 * @see Cybersource_Payment_Model::$signed_field_names
	 * @see Cybersource_Payment_Model::$signed_fields_to_variables_map
	 * @see Cybersource_Payment_Model::$transaction_type
	 * @see Cybersource_Payment_Model::$transaction_uuid
	 * @see Cybersource_Payment_Model::$unsigned_field_names
	 *
	 * @param string $template_uri              File system path to a HTML
	 *                                          template.
	 * @param object $globals_configuration     HTML resource configuration
	 *                                          object.
	 * @param object $database_configuration    Database configuration object.
	 * @param object $cybersource_configuration CybeSource configuartion object.
	 */
	public function __construct(
		$template_uri,
		$globals_configuration,
		$database_configuration,
		$cybersource_configuration
	) {
		parent::__construct(
			$template_uri,
			$globals_configuration,
			$cybersource_configuration->get_form_post_url(),
                        $database_configuration
		);
/*
		$this->database_connection = new PDO(
			$database_configuration->get_data_source_name(),
			$database_configuration->get_username(),
			$database_configuration->get_password()
		);*/

		$this->signed_fields_to_variables_map = array(
			'access_key' => &$this->access_key,
			'bill_to_address_country' => &$this->bill_to_address_country,
			'bill_to_address_state' => &$this->bill_to_address_state,
			'currency' => &$this->currency,
			'customer_ip_address' => &$this->customer_ip_address,
			'item_0_name' => &$this->item_0_name,
			'item_0_quantity' => &$this->item_0_quantity,
			'item_0_unit_price' => &$this->item_0_unit_price,
			'line_item_count' => &$this->line_item_count,
			'locale' => &$this->locale,
			'merchant_defined_data1' => &$this->first_name,
			'merchant_defined_data2' => &$this->last_name,
			'merchant_defined_data3' => &$this->middle_name,
			'merchant_defined_data4' => &$this->date_of_birth,
			'merchant_defined_data5' => &$this->program_of_study,
			'profile_id' => &$this->profile_id,
			'reference_number' => &$this->reference_number,
			'signed_date_time' => &$this->signed_date_time,
			'signed_field_names' => &$this->signed_field_names,
			'transaction_type' => &$this->transaction_type,
			'transaction_uuid' => &$this->transaction_uuid,
			'unsigned_field_names' => &$this->unsigned_field_names,
		);

		$this->bill_to_address_country =
			$cybersource_configuration->get_bill_to_address_country()
		;
		$this->bill_to_address_state =
			$cybersource_configuration->get_bill_to_address_state()
		;
		$this->currency = $cybersource_configuration->get_currency();
		$this->customer_ip_address = $this->get_customer_ip_address();
		$this->access_key =
			$cybersource_configuration->get_access_key()
		;
		$this->locale = $cybersource_configuration->get_locale();
		$this->profile_id =
			$cybersource_configuration->get_profile_id()
		;
		$this->secret_key =
			$cybersource_configuration->get_secret_key()
		;
		$this->item_0_name = $cybersource_configuration->get_item_description();

		// Mutiple unit quantites not implemented. Always equals 1.
		$this->item_0_quantity = '1';
		$this->item_0_unit_price = $cybersource_configuration->get_fee();

		// Mutiple items not implemented. Line item count always equals 1.
		$this->line_item_count = '1';
		$this->signed_field_names = implode(
			',',
			array_keys( $this->signed_fields_to_variables_map )
		);
		$this->transaction_type =
			$cybersource_configuration->get_transaction_type()
		;
		$this->transaction_uuid = uniqid();

		/*
		 * All form fields sent to CyberSource are signed. Unsigned field names
		 * are not implemented.
		 */
		$this->unsigned_field_names = '';
	}

	/**
	 * Get the CyberSource access key for the transaction.
	 *
	 * Helper method that returns the CyberSource access key to use for
	 * authenticating the transaction.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$access_key
	 * @return string CyberSource access key.
	 */
	public function get_access_key() {
		return $this->access_key;
	}

	/**
	 * Get the bill to address country.
	 *
	 * Helper method that returns the bill to address country.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$bill_to_address_country
	 * @return string Bill to address country.
	 */
	public function get_bill_to_address_country() {
		return $this->bill_to_address_country;
	}

	/**
	 * Get the bill to address state.
	 *
	 * Helper method that returns the bill to address state.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$bill_to_address_state
	 * @return string Bill to address state.
	 */
	public function get_bill_to_address_state() {
		return $this->bill_to_address_state;
	}

	/**
	 * Get the type of currency for the transaction.
	 *
	 * Helper method that returns the type of currency to use for the
	 * transaction.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$currency
	 * @return string A type of currency.
	 */
	public function get_currency() {
		return $this->currency;
	}

	/**
	 * Get the customer IP address.
	 *
	 * Helper method that returns the customer's Internet Protocol (IP) address.
	 *
	 * @since 1.0.0
	 * @return string The requesting client's IP address.
	 */
	public function get_customer_ip_address() {
		return $_SERVER['REMOTE_ADDR'];
	}

	/**
	 * Get the item 0 name.
	 *
	 * Helper method that returns item 0's name.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$item_0_name
	 * @return string Item 0's name.
	 */
	public function get_item_0_name() {
		return $this->item_0_name;
	}

	/**
	 * Get the item 0 unit quantity.
	 *
	 * Helper method that returns item 0's unit quantity.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$item_0_quantity
	 * @return string Item 0's unit quantity.
	 */
	public function get_item_0_quantity() {
		return $this->item_0_quantity;
	}

	/**
	 * Get the item 0 unit price.
	 *
	 * Helper method that returns item 0's unit price.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$item_0_unit_price
	 * @return string Item 0's unit price.
	 */
	public function get_item_0_unit_price() {
		return $this->item_0_unit_price;
	}

	/**
	 * Get the line item count.
	 *
	 * Helper method that returns the total count of line items.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$line_item_count
	 * @return string Total count of line items.
	 */
	public function get_line_item_count() {
		return $this->line_item_count;
	}

	/**
	 * Get the CyberSource locale (language) for the transaction.
	 *
	 * Helper method that returns the CyberSource locale (language) to use for
	 * the transaction.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$locale
	 * @return string CyberSource locale.
	 */
	public function get_locale() {
		return $this->locale;
	}

	/**
	 * Get the CyberSource profile ID for the transaction.
	 *
	 * Helper method that returns the CyberSource profile ID to use for
	 * identifying the CyberSource profile (account).
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$profile_id
	 * @return string CyberSource profile ID.
	 */
	public function get_profile_id() {
		return $this->profile_id;
	}

	/**
	 * Get the program of study code.
	 *
	 * Helper method that returns the student's selected program of study code.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$program_of_study
	 * @return string Program of study code.
	 */
	public function get_program_of_study() {
		return $this->program_of_study;
	}

	/**
	 * Get the transaction reference number.
	 *
	 * Helper method that returns the reference number to use with the
	 * transaction.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$reference_number
	 * @return string Program of study code.
	 */
	public function get_reference_number() {
		return $this->reference_number;
	}

	/**
	 * Get the transaction signature.
	 *
	 * Helper method that returns the transaction signature that CyberSource
	 * uses to verify the transaction is authentic.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$signature
	 * @return string Transaction signature.
	 */
	public function get_signature() {
		return $this->signature;
	}

	/**
	 * Get the signature date time.
	 *
	 * Helper method that returns the signature date time (time stamp).
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$signed_date_time
	 * @return string Signature date time.
	 */
	public function get_signed_date_time() {
		return $this->signed_date_time;
	}

	/**
	 * Get the signed field names.
	 *
	 * Helper method that returns the transaction signed field names.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$signed_field_names
	 * @return string Transaction signed field names.
	 */
	public function get_signed_field_names() {
		return $this->signed_field_names;
	}

	/**
	 * Get the transaction type.
	 *
	 * Helper method that returns the transaction type to use with CyberSource.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$transaction_type
	 * @return string Transaction type.
	 */
	public function get_transaction_type() {
		return $this->transaction_type;
	}

	/**
	 * Get the transaction unique identifier.
	 *
	 * Helper method that returns the transaction unique identifier.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$transaction_uuid
	 * @return string Transaction unique identifier.
	 */
	public function get_transaction_uuid() {
		return $this->transaction_uuid;
	}

	/**
	 * Get the unsigned field names.
	 *
	 * Helper method that returns the transaction unsigned field names.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$unsigned_field_names
	 * @return string Transaction unsigned field names.
	 */
	public function get_unsigned_field_names() {
		return $this->unsigned_field_names;
	}

	/**
	 * Save student information to the data source and set the reference number.
	 *
	 * Save student information such as first name, last name, date of birth,
	 * program of study, etc. to the data source. Also receive the transaction
	 * reference number from the database.
	 *
	 * @since 1.0.0
	 *
	 * @see Cybersource_Payment_Model::$reference_number
	 */
	public function save_data_and_set_reference_number() {
		$tsql = 'EXEC dbo.usp_WebAppFee'
			. ' @FirstName = :first_name,'
			. ' @LastName = :last_name,'
			. ' @MiddleName = :middle_name,'
			. ' @DOB = :date_of_birth,'
			. ' @Amount = :amount,'
			. ' @POS = :program_of_study,'
                        . ' @YRQ = :yrq'
			. ';'
		;
                
		$values = array(
			':first_name'       => $this->first_name,
			':last_name'        => $this->last_name,
			':middle_name'      => $this->middle_name,
			':date_of_birth'    => $this->date_of_birth,
			':amount'           => $this->item_0_unit_price,
			':program_of_study' => $this->program_of_study,
                        ':yrq'              => $this->year_quarter_applied_for
		);
                
		$query = $this->database_connection->prepare( $tsql );
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

	/**
	 * Set the program of study code.
	 *
	 * Helper method that sets the student's selected program of study code.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$program_of_study
	 * @param string $program_of_study Program of study code.
	 */
	public function set_program_of_study( $program_of_study ) {
		$this->program_of_study = $program_of_study;
	}

	/**
	 * Set the transaction signature.
	 *
	 * Helper method that sets the transaction signature that CyberSource uses
	 * to verify the transaction is authentic.
	 *
	 * @since 1.0.0
	 *
	 * @see Cybersource_Payment_Model::$secret_key
	 * @see Cybersource_Payment_Model::$signature
	 * @see Cybersource_Payment_Model::$signed_fields_to_variables_map
	 * @see Cybersource_Payment_Model::set_signed_date_time()
	 */
	public function set_signature() {
		$this->set_signed_date_time();
		$data_to_sign = '';
		foreach ( $this->signed_fields_to_variables_map
			as $field => $value
		) {
			$data_to_sign .= "$field=$value,";
		}
		// Remove trailing comma
		$data_to_sign = substr( $data_to_sign, 0, -1 );
		$hash = hash_hmac(
			'sha256',
			$data_to_sign,
			$this->secret_key,
			true
		);
		$this->signature = base64_encode( $hash );
	}

	/**
	 * Set the signature date time.
	 *
	 * Helper method that sets the signature date time (time stamp).
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$signed_date_time
	 */
	public function set_signed_date_time() {
		$this->signed_date_time = gmdate( 'Y-m-d\TH:i:s\Z' );
	}
}
