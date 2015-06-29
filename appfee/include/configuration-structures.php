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
 * Configuration class structures file
 *
 * This file contains configuration class structures with class constants to
 * group similar configuration settings together from configuration.php
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage Configuration
 * @since 1.0.0
 */

/**
 * Load the user configurable constants.
 */
require( 'configuration.php' );

/**
 * Database configuration settings
 *
 * Contains configuration constants for database settings.
 *
 * @since 1.0.0
 */
class Database_Configuration {

	/**
	 * Data source name (database connection parameters).
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const DATA_SOURCE_NAME = DATABASE_DSN;

	/**
	 * Password to use with the data source.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const PASSWORD = DATABASE_PASSWORD;

	/**
	 * User name to use with the data source.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const USERNAME = DATABASE_USER;

	/**
	 * Get the data source name (DSN).
	 *
	 * Helper method that returns the DATA_SOURCE_NAME property.
	 *
	 * @since 1.0.0
	 * @see Database_Configuration::DATA_SOURCE_NAME
	 * @return string Data source name (DSN).
	 */
	function get_data_source_name() {
		return self::DATA_SOURCE_NAME;
	}

	/**
	 * Get the password.
	 *
	 * Helper method that returns the PASSWORD property.
	 *
	 * @since 1.0.0
	 * @see Database_Configuration::PASSWORD
	 * @return string Password.
	 */
	function get_password() {
		return self::PASSWORD;
	}

	/**
	 * Get the user name.
	 *
	 * Helper method that returns the USERNAME property.
	 *
	 * @since 1.0.0
	 * @see Database_Configuration::USERNAME
	 * @return string User name.
	 */
	function get_username() {
		return self::USERNAME;
	}
}

/**
 * Configuration settings related to general admissions
 *
 * Contains configuration constants for the general admissions process.
 *
 * @since 1.0.0
 */
class General_Admissions_Configuration {

	/**
	 * CyberSource access key.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const ACCESS_KEY = CYBERSOURCE_ACCESS_KEY;

	/**
	 * Bill to address country.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const BILL_TO_ADDRESS_COUNTRY = DEFAULT_BILL_TO_ADDRESS_COUNTRY;

	/**
	 * Bill to address state.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const BILL_TO_ADDRESS_STATE = DEFAULT_BILL_TO_ADDRESS_STATE;

	/**
	 * Type of currency.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const CURRENCY = CURRENCY;

	/**
	 * Fee to be paid.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const FEE = GENERAL_ADMISSIONS_FEE;

	/**
	 * CyberSource URL used to post transaction information.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const FORM_POST_URL = CYBERSOURCE_FORM_POST_URL;

	/**
	 * Item unit description.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const ITEM_DESCRIPTION = GENERAL_ADMISSIONS_ITEM_DESCRIPTION;

	/**
	 * Locale (language).
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const LOCALE = CYBERSOURCE_LOCALE;

	/**
	 * CyberSource profile ID.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const PROFILE_ID = CYBERSOURCE_PROFILE_ID;

	/**
	 * CyberSource secret key.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const SECRET_KEY = CYBERSOURCE_SECRET_KEY;

	/**
	 * Transaction type.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const TRANSACTION_TYPE = DEFAULT_TRANSACTION_TYPE;

	/**
	 * Get the CyberSource access key.
	 *
	 * Helper method that returns the ACCESS_KEY property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::ACCESS_KEY
	 * @return string CyberSource access key.
	 */
	function get_access_key() {
		return self::ACCESS_KEY;
	}

	/**
	 * Get the bill to address country.
	 *
	 * Helper method that returns the BILL_TO_ADDRESS_COUNTRY property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::BILL_TO_ADDRESS_COUNTRY
	 * @return string Bill to address country.
	 */
	function get_bill_to_address_country() {
		return self::BILL_TO_ADDRESS_COUNTRY;
	}

	/**
	 * Get the bill to address state.
	 *
	 * Helper method that returns the BILL_TO_ADDRESS_STATE property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::BILL_TO_ADDRESS_STATE
	 * @return string Bill to address country.
	 */
	function get_bill_to_address_state() {
		return self::BILL_TO_ADDRESS_STATE;
	}

	/**
	 * Get type of currency.
	 *
	 * Helper method that returns the CURRENCY property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::CURRENCY
	 * @return string Type of currency.
	 */
	function get_currency() {
		return self::CURRENCY;
	}

	/**
	 * Get the fee.
	 *
	 * Helper method that returns the FEE property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::FEE
	 * @return string Fee.
	 */
	function get_fee() {
		return self::FEE;
	}

	/**
	 * Get the form post URL.
	 *
	 * Helper method that returns the FORM_POST_URL property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::FORM_POST_URL
	 * @return string Fee.
	 */
	function get_form_post_url() {
		return self::FORM_POST_URL;
	}

	/**
	 * Get the item description.
	 *
	 * Helper method that returns the ITEM_DESCRIPTION property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::ITEM_DESCRIPTION
	 * @return string Item description.
	 */
	function get_item_description() {
		return self::ITEM_DESCRIPTION;
	}

	/**
	 * Get the locale.
	 *
	 * Helper method that returns the LOCALE property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::LOCALE
	 * @return string Locale.
	 */
	function get_locale() {
		return self::LOCALE;
	}

	/**
	 * Get the CyberSource profile ID.
	 *
	 * Helper method that returns the PROFILE_ID property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::PROFILE_ID
	 * @return string CyberSource profile ID.
	 */
	function get_profile_id() {
		return self::PROFILE_ID;
	}

	/**
	 * Get the CyberSource secret key.
	 *
	 * Helper method that returns the SECRET_KEY property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::SECRET_KEY
	 * @return string CyberSource secret key.
	 */
	function get_secret_key() {
		return self::SECRET_KEY;
	}

	/**
	 * Get the transaction type.
	 *
	 * Helper method that returns the TRANSACTION_TYPE property.
	 *
	 * @since 1.0.0
	 * @see General_Admissions_Configuration::TRANSACTION_TYPE
	 * @return string Transaction type.
	 */
	function get_transaction_type() {
		return self::TRANSACTION_TYPE;
	}
}

/**
 * Configuration settings related to general admissions
 *
 * Contains configuration constants for the general admissions process.
 *
 * @since 1.0.0
 */
class HTML_Resource_Library {

	/**
	 * File system path to HTML resources.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const PATH = GLOBALS_PATH;

	/**
	 * URL where resources can be referenced.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	const URL = GLOBALS_URL;

	/**
	 * Get the file system path.
	 *
	 * Helper method that returns the PATH property.
	 *
	 * @since 1.0.0
	 * @see HTML_Resource_Library::PATH
	 * @return string File system path.
	 */
	function get_path() {
		return self::PATH;
	}

	/**
	 * Get the URL.
	 *
	 * Helper method that returns the URL property.
	 *
	 * @since 1.0.0
	 * @see HTML_Resource_Library::URL
	 * @return string URL.
	 */
	function get_url() {
		return self::URL;
	}
}
