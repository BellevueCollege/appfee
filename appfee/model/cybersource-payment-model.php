<?php
/**
 * CyberSource payment model class file
 *
 * This file contains the Cybersource_Payment_Model class that extends the
 * default model.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage Model
 * @since 1.0.0
 */

/**
 * Load the the default model class.
 */
require_once( 'default-model.php' );

/**
 * Defines the CyberSource payment model
 *
 * This class defines the model to be used to submit CyberSource payment.
 *
 * @since 1.0.0
 */
class Cybersource_Payment_Model extends Default_Model {

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
	 * CyberSource access key.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $cybersource_access_key;

	/**
	 * CyberSource supported locale (language).
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $cybersource_locale;

	/**
	 * CyberSource profile id.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $cybersource_profile_id;

	/**
	 * CyberSource secret key.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $cybersource_secret_key;

	/**
	 * Array map of CyberSource field name keys to class property variable
	 * values.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var array $args {
	 *     @type string $access_key maps to {@see Cybersource_Payment_Model::$cybersource_access_key}
	 *     @type string $bill_to_address_country maps to {@see Cybersource_Payment_Model::$bill_to_address_country}
	 *     @type string $bill_to_address_state maps to {@see Cybersource_Payment_Model::$bill_to_address_state}
	 *     @type string $bill_to_forename maps to {@see Cybersource_Payment_Model::$student_first_name}
	 *     @type string $bill_to_surname maps to {@see Cybersource_Payment_Model::$student_last_name}
	 *     @type string $currency maps to {@see Cybersource_Payment_Model::$currency}
	 *     @type string $customer_ip_address maps to {@see Cybersource_Payment_Model::$customer_ip_address}
	 *     @type string $item_0_name maps to {@see Cybersource_Payment_Model::$item_0_name}
	 *     @type string $item_0_quantity maps to {@see Cybersource_Payment_Model::$item_0_quantity}
	 *     @type string $item_0_unit_price maps to {@see Cybersource_Payment_Model::$item_0_unit_price}
	 *     @type string $line_item_count maps to {@see Cybersource_Payment_Model::$line_item_count}
	 *     @type string $locale maps to {@see Cybersource_Payment_Model::$cybersource_locale}
	 *     @type string $merchant_defined_data1 maps to {@see Cybersource_Payment_Model::$student_first_name}
	 *     @type string $merchant_defined_data2 maps to {@see Cybersource_Payment_Model::$student_last_name}
	 *     @type string $merchant_defined_data3 maps to {@see Cybersource_Payment_Model::$student_middle_name}
	 *     @type string $merchant_defined_data4 maps to {@see Cybersource_Payment_Model::$student_date_of_birth}
	 *     @type string $merchant_defined_data5 maps to {@see Cybersource_Payment_Model::$program_of_study}
	 *     @type string $profile_id maps to {@see Cybersource_Payment_Model::$cybersource_profile_id}
	 *     @type string $reference_number maps to {@see Cybersource_Payment_Model::$reference_number}
	 *     @type string $signed_date_time maps to {@see Cybersource_Payment_Model::$signed_date_time}
	 *     @type string $signed_field_names maps to {@see Cybersource_Payment_Model::$signed_field_names}
	 *     @type string $transaction_type maps to {@see Cybersource_Payment_Model::$transaction_type}
	 *     @type string $transaction_uuid maps to {@see Cybersource_Payment_Model::$transaction_uuid}
	 *     @type string $unsigned_field_names maps to {@see Cybersource_Payment_Model::$unsigned_field_names}
	 * }
	 */
	protected $cybersource_signed_fields_to_variables_map;

	/**
	 * A PDO Object.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var PDO
	 */
	protected $database_connection;

	/**
	 * URL that can be used to post the program of study form.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $form_post_url;

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
	 * Student's date of birth.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $student_date_of_birth;

	/**
	 * Student's first name.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $student_first_name;

	/**
	 * Student's last name.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $student_last_name;

	/**
	 * Student's middle name.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $student_middle_name;

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
	 * @see Default_Model::$template_uri
	 * @see Default_Model::$globals_path
	 * @see Default_Model::$globals_url
	 * @see Cybersource_Payment_Model::$database_connection
	 * @see Cybersource_Payment_Model::$cybersource_signed_fields_to_variables_map
	 * @see Cybersource_Payment_Model::$bill_to_address_country
	 * @see Cybersource_Payment_Model::$bill_to_address_state
	 * @see Cybersource_Payment_Model::$currency
	 * @see Cybersource_Payment_Model::$customer_ip_address
	 * @see Cybersource_Payment_Model::$cybersource_access_key
	 * @see Cybersource_Payment_Model::$cybersource_locale
	 * @see Cybersource_Payment_Model::$cybersource_profile_id
	 * @see Cybersource_Payment_Model::$cybersource_secret_key
	 * @see Cybersource_Payment_Model::$form_post_url
	 * @see Cybersource_Payment_Model::$item_0_name
	 * @see Cybersource_Payment_Model::$item_0_quantity
	 * @see Cybersource_Payment_Model::$item_0_unit_price
	 * @see Cybersource_Payment_Model::$line_item_count
	 * @see Cybersource_Payment_Model::$signed_field_names
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
		parent::__construct( $template_uri, $globals_configuration );

		$this->database_connection = new PDO(
			$database_configuration->get_data_source_name(),
			$database_configuration->get_username(),
			$database_configuration->get_password()
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

		$this->bill_to_address_country =
			$cybersource_configuration->get_bill_to_address_country()
		;
		$this->bill_to_address_state =
			$cybersource_configuration->get_bill_to_address_state()
		;
		$this->currency = $cybersource_configuration->get_currency();
		$this->customer_ip_address = $this->get_customer_ip_address();
		$this->cybersource_access_key =
			$cybersource_configuration->get_access_key()
		;
		$this->cybersource_locale = $cybersource_configuration->get_locale();
		$this->cybersource_profile_id =
			$cybersource_configuration->get_profile_id()
		;
		$this->cybersource_secret_key =
			$cybersource_configuration->get_secret_key()
		;
		$this->form_post_url = $cybersource_configuration->get_form_post_url();
		$this->item_0_name = $cybersource_configuration->get_item_description();

		// Mutiple unit quantites not implemented. Always equals 1.
		$this->item_0_quantity = '1';
		$this->item_0_unit_price = $cybersource_configuration->get_fee();

		// Mutiple items not implemented. Line item count always equals 1.
		$this->line_item_count = '1';
		$this->signed_field_names = implode(
			',',
			array_keys( $this->cybersource_signed_fields_to_variables_map )
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
	 * Get the customer IP address.
	 *
	 * Helper method that returns the customer's Internet Protocol (IP) address.
	 *
	 * @since 1.0.0
	 * @return string $_SERVER['REMOTE_ADDR'].
	 */
	public function get_customer_ip_address() {
		return $_SERVER['REMOTE_ADDR'];
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
	 * Get the CyberSource access key for the transaction.
	 *
	 * Helper method that returns the CyberSource access key to use for
	 * authenticating the transaction.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$cybersource_access_key
	 * @return string CyberSource access key.
	 */
	public function get_cybersource_access_key() {
		return $this->cybersource_access_key;
	}

	/**
	 * Get the CyberSource locale (language) for the transaction.
	 *
	 * Helper method that returns the CyberSource locale (language) to use for
	 * the transaction.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$cybersource_locale
	 * @return string CyberSource locale.
	 */
	public function get_cybersource_locale() {
		return $this->cybersource_locale;
	}

	/**
	 * Get the CyberSource profile ID for the transaction.
	 *
	 * Helper method that returns the CyberSource profile ID to use for
	 * identifying the CyberSource profile (account).
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$cybersource_profile_id
	 * @return string CyberSource profile ID.
	 */
	public function get_cybersource_profile_id() {
		return $this->cybersource_profile_id;
	}

	/**
	 * Get the form post URL property.
	 *
	 * Helper method that returns the form post URL property.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$form_post_url
	 * @return string URL that can be posted to.
	 */
	public function get_form_post_url() {
		return $this->form_post_url;
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
	 * @see Cybersource_Payment_Model::$program_of_study
	 * @return string Program of study code.
	 */
	public function get_reference_number() {
		return $this->reference_number;
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
	 * Get the student date of birth.
	 *
	 * Helper method that returns the student's date of birth.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$student_date_of_birth
	 * @return string Student date of birth.
	 */
	public function get_student_date_of_birth() {
		return $this->student_date_of_birth;
	}

	/**
	 * Get the student first name.
	 *
	 * Helper method that returns the student's first name.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$student_first_name
	 * @return string Student first name.
	 */
	public function get_student_first_name() {
		return $this->student_first_name;
	}

	/**
	 * Get the student late name.
	 *
	 * Helper method that returns the student's last name.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$student_last_name
	 * @return string Student last name.
	 */
	public function get_student_last_name() {
		return $this->student_last_name;
	}

	/**
	 * Get the student middle name.
	 *
	 * Helper method that returns the student's middle name.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$student_middle_name
	 * @return string Student middle name.
	 */
	public function get_student_middle_name() {
		return $this->student_middle_name;
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
	 * @see Cybersource_Payment_Model::$database_connection
	 * @see Cybersource_Payment_Model::$item_0_unit_price
	 * @see Cybersource_Payment_Model::$program_of_study
	 * @see Cybersource_Payment_Model::$reference_number
	 * @see Cybersource_Payment_Model::$student_date_of_birth
	 * @see Cybersource_Payment_Model::$student_first_name
	 * @see Cybersource_Payment_Model::$student_last_name
	 * @see Cybersource_Payment_Model::$student_middle_name
	 */
	public function save_data() {
		$tsql = 'EXEC dbo.usp_WebAppFee'
			. ' @FirstName = :first_name,'
			. ' @LastName = :last_name,'
			. ' @MiddleName = :middle_name,'
			. ' @DOB = :date_of_birth,'
			. ' @Amount = :amount,'
			. ' @POS = :program_of_study'
			. ';'
		;
		$query = $this->database_connection->prepare( $tsql );
		$values = array(
			':first_name'       => $this->student_first_name,
			':last_name'        => $this->student_last_name,
			':middle_name'      => $this->student_middle_name,
			':date_of_birth'    => $this->student_date_of_birth,
			':amount'           => $this->item_0_unit_price,
			':program_of_study' => $this->program_of_study,
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
	 * @see Cybersource_Payment_Model::$cybersource_secret_key
	 * @see Cybersource_Payment_Model::$cybersource_signed_fields_to_variables_map
	 * @see Cybersource_Payment_Model::set_signed_date_time()
	 * @see Cybersource_Payment_Model::$signature
	 */
	public function set_signature() {
		$this->set_signed_date_time();
		$data_to_sign = '';
		foreach ( $this->cybersource_signed_fields_to_variables_map
			as $field => $value
		) {
			$data_to_sign .= "$field=$value,";
		}
		// Remove trailing comma
		$data_to_sign = substr( $data_to_sign, 0, -1 );
		$hash = hash_hmac(
			'sha256',
			$data_to_sign,
			$this->cybersource_secret_key,
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

	/**
	 * Set the student date of birth.
	 *
	 * Helper method that sets the student's date of birth.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$student_date_of_birth
	 * @param string $student_date_of_birth Student date of birth.
	 */
	public function set_student_date_of_birth( $student_date_of_birth ) {
		$this->student_date_of_birth = $student_date_of_birth;
	}

	/**
	 * Set the student first name.
	 *
	 * Helper method that sets the student's first name.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$student_first_name
	 * @param string $student_first_name Student first name.
	 */
	public function set_student_first_name( $student_first_name ) {
		$this->student_first_name = $student_first_name;
	}

	/**
	 * Set the student last name.
	 *
	 * Helper method that sets the student's last name.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$student_last_name
	 * @param string $student_last_name Student last name.
	 */
	public function set_student_last_name( $student_last_name ) {
		$this->student_last_name = $student_last_name;
	}

	/**
	 * Set the student middle name.
	 *
	 * Helper method that sets the student's middle name.
	 *
	 * @since 1.0.0
	 * @see Cybersource_Payment_Model::$student_middle_name
	 * @param string $student_middle_name Student middle name.
	 */
	public function set_student_middle_name( $student_middle_name ) {
		$this->student_middle_name = $student_middle_name;
	}
}
