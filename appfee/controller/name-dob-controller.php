<?php

require_once( 'default-controller.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */

class Name_DOB_Controller extends Default_Controller {

	protected $regex_date_of_birth;
	protected $regex_name;

	public function __construct( $model ) {
		parent::__construct( $model );

		$this->regex_date_of_birth = '/^(0?[1-9]|1[0-2])\/'
			. '(0?[1-9]|[1-2][0-9]|3[0-1])\/'
			. '((19|[2-9][0-9])[0-9]{2})$/'
		;
		$this->regex_name = '/^[a-z\-.,()\'"\s]+$/i';
	}

	public function is_valid_date_of_birth( $date_of_birth ) {
		$is_valid_date = preg_match(
			$this->regex_date_of_birth,
			$date_of_birth,
			$matches
		);
		if ( ! $is_valid_date ) {
			return false;
		}

		$year = $matches[3];
		$month = $matches[1];
		$day = $matches[2];
		$date_of_birth_integer = strtotime( $date_of_birth );
		if ( $date_of_birth_integer > time()
			|| ! checkdate( $month, $day, $year )
		) {
			return false;
		}

		return true;
	}

	public function is_valid_name( $name ) {
		$is_valid_name = preg_match(
			$this->regex_name,
			$name
		);
		if ( ! $is_valid_name ) {
			return false;
		}
		return true;
	}
}
