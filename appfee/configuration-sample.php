<?php
/**
 * AppFee sample configuration file
 *
 * Defines constants used by the end user to configure the application for their
 * environment. This file should be populated with the appropriate values and
 * saved under the file name configuration.php
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage Configuration
 * @since 1.0.0
 */

/**
 * Defines the base URI where the application is being hosted.
 *
 * @since 1.0.0
 * @var string
 */
define( 'BASE_URI', '' );

/**
 * Defines the currency denomination used with CyberSource.
 *
 * @since 1.0.0
 * @var string
 */
define( 'CURRENCY', '' );

/**
 * Defines the access key to use when communicating with CyberSource.
 *
 * @since 1.0.0
 * @var string
 */
define( 'CYBERSOURCE_ACCESS_KEY', '' );

/**
 * Defines CyberSource Secure Acceptance Web/Mobile URL for posting payment.
 *
 * @since 1.0.0
 * @var string
 */
define( 'CYBERSOURCE_FORM_POST_URL', '' );

/**
 * Defines which supported locale CyberSource will use.
 *
 * @since 1.0.0
 * @var string
 */
define( 'CYBERSOURCE_LOCALE', '' );

/**
 * Defines which CyberSource profile ID to use.
 *
 * @since 1.0.0
 * @var string
 */
define( 'CYBERSOURCE_PROFILE_ID', '' );

/**
 * Defines which CyberSource secret key to use.
 *
 * @since 1.0.0
 * @var string
 */
define( 'CYBERSOURCE_SECRET_KEY', '' );

/**
 * Defines the data source name (database connection parameters).
 *
 * @since 1.0.0
 * @var string
 */
define( 'DATABASE_DSN', '' );

/**
 * Defines the user name to use when connecting to the data source.
 *
 * @since 1.0.0
 * @var string
 */
define( 'DATABASE_USER', '' );

/**
 * Defines the password to use when connecting to the data source.
 *
 * @since 1.0.0
 * @var string
 */
define( 'DATABASE_PASSWORD', '' );

/**
 * Defines the database table to use for saving student information.
 *
 * @since 1.0.0
 * @var string
 */
define( 'DATABASE_TABLE', '' );

/**
 * Defines the default billing address country to be sent to CyberSource.
 *
 * @since 1.0.0
 * @var string
 */
define( 'DEFAULT_BILL_TO_ADDRESS_COUNTRY', '' );

/**
 * Defines the default billing address state to be sent to CyberSource.
 *
 * @since 1.0.0
 * @var string
 */
define( 'DEFAULT_BILL_TO_ADDRESS_STATE', '' );

/**
 * Defines the transaction type to be used with CyberSource.
 *
 * @since 1.0.0
 * @var string
 */
define( 'DEFAULT_TRANSACTION_TYPE', '' );

/**
 * Defines the fee to be charged for general admissions.
 *
 * @since 1.0.0
 * @var string
 */
define( 'GENERAL_ADMISSIONS_FEE', '' );

/**
 * Defines the line item description for general admissions.
 *
 * @since 1.0.0
 * @var string
 */
define( 'GENERAL_ADMISSIONS_ITEM_DESCRIPTION', '' );

/**
 * Defines the file system path where the library globals can be found.
 *
 * @since 1.0.0
 * @var string
 */
define( 'GLOBALS_PATH', '' );

/**
 * Defines the URL where the library globals can be referenced.
 *
 * @since 1.0.0
 * @var string
 */
define( 'GLOBALS_URL', '' );

/**
 * Defines the local timezone.
 *
 * @since 1.0.0
 * @var string
 */
define( 'TIMEZONE', '' );
