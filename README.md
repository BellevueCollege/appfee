# AppFee

AppFee provides a frontend for the [CyberSource](http://www.cybersource.com/)
[Secure Acceptance Web/Mobile]
(http://www.cybersource.com/products/payment_security/secure_acceptance_web_mobile/)
payment platform.

## Configuration

When deploying this application you must provide a valid configuration.php file.
The [configuration-sample.php](./appfee/configuration-sample.php) file is
provided as a template.

### BASE_URI

The directory that the application is hosted from.

**If application URL is**

http://www.example.local/appfee

**Base URI will be**

/appfee

### CURRENCY

Default currency code to use with CyberSource Secure Acceptance. Must be one of
the documented currency codes.

<http://apps.cybersource.com/library/documentation/sbc/quickref/currencies.pdf>

### CYBERSOURCE_ACCESS_KEY

Access Key from the CyberSource Secure Acceptance Profile.

<http://apps.cybersource.com/library/documentation/dev_guides/Secure_Acceptance_WM/html/wwhelp/wwhimpl/js/html/wwhelp.htm#href=creating_profile.05.3.html#>

### CYBERSOURCE_FORM_POST_URL

Endpoint for CyberSource Secure Acceptance Web/Mobile.

<http://apps.cybersource.com/library/documentation/dev_guides/Secure_Acceptance_WM/html/wwhelp/wwhimpl/js/html/wwhelp.htm#href=creating_profile.05.7.html>

### CYBERSOURCE_LOCALE

The locale code that sets the CyberSource Secure Acceptance Web/Mobile language
to be used for the transaction.

<http://apps.cybersource.com/library/documentation/dev_guides/Secure_Acceptance_WM/html/wwhelp/wwhimpl/js/html/wwhelp.htm#href=creating_profile.05.6.html>

### CYBERSOURCE_PROFILE_ID

CyberSource Secure Acceptance Web/Mobile profile ID to use.

### CYBERSOURCE_SECRET_KEY

Secret Key from the CyberSource Secure Acceptance Profile.

<http://apps.cybersource.com/library/documentation/dev_guides/Secure_Acceptance_WM/html/wwhelp/wwhimpl/js/html/wwhelp.htm#href=creating_profile.05.3.html#>

### DATABASE_DSN

The data source name (DSN) to use for data connections.

*Example:* dblib:host=mssql.example.local:1433\OptionalInstanceName;dbname=Database

*PHP Documentation:* [PDO Drivers](https://php.net/manual/en/pdo.drivers.php)

### DATABASE_USER

User string to use when authenticating to the data source.

### DATABASE_PASSWORD

Password to use with the user string to authenticate to the data source.

### DEFAULT_BILL_TO_ADDRESS_COUNTRY

Default country to be prepopulated with the CyberSource Secure Acceptance
Web/Mobile transaction. Must be a valid ISO country code.

<http://apps.cybersource.com/library/documentation/sbc/quickref/countries_alpha_list.pdf>

### DEFAULT_BILL_TO_ADDRESS_STATE

Default state to be prepopulated with the CyberSource Secure Acceptance
Web/Mobile transaction. Must be a valid state or province code.

<http://apps.cybersource.com/library/documentation/sbc/quickref/states_and_provinces.pdf>

### GENERAL_ADMISSIONS_FEE

Fee to be used with the General Admissions process.

### GENERAL_ADMISSIONS_ITEM_DESCRIPTION

Line item description for the General Admissions fee.

### GLOBALS_PATH

File system path to the location of the globals library for application style,
headers, and footers.

### GLOBALS_URL

HTTP URL path to the location of the globals library for application style,
headers, and footers.

### TIMEZONE

Timezone to use for time calculations.

*PHP Documentation:* [List of Supported Timezones]
(https://php.net/manual/en/timezones.php)
