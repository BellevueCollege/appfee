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
 * CyberSource payment view class file
 *
 * This file contains the Cybersource_Payment_View class that extends the
 * default view.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage View
 * @since 1.0.0
 */

/**
 * Load the the default view class.
 */
require_once( 'name-dob-view.php' );

/**
 * Defines the CyberSource payment view
 *
 * This class defines the view to be used to submit CyberSource payment.
 *
 * @since 1.0.0
 */
class Cybersource_Payment_View extends Name_DOB_View {

	/**
	 * Set template variables
	 *
	 * Helper method that populates the template variables property.
	 *
	 * @since 1.0.0
	 * @see Default_Model::$template_variables
	 */
	protected function set_template_variables() {
		parent::set_template_variables();
		$this->template_variables['bill_to_address_country'] = $this->model->get_bill_to_address_country();
		$this->template_variables['bill_to_address_state'] = $this->model->get_bill_to_address_state();
		$this->template_variables['currency'] = $this->model->get_currency();
		$this->template_variables['current_url'] = $this->model->get_current_url();
		$this->template_variables['customer_ip_address'] = $this->model->get_customer_ip_address();
		$this->template_variables['cybersource_access_key'] = $this->model->get_access_key();
		$this->template_variables['cybersource_locale'] = $this->model->get_locale();
		$this->template_variables['cybersource_profile_id'] = $this->model->get_profile_id();
		$this->template_variables['item_0_name'] = $this->model->get_item_0_name();
		$this->template_variables['item_0_quantity'] = $this->model->get_item_0_quantity();
		$this->template_variables['item_0_unit_price'] = $this->model->get_item_0_unit_price();
		$this->template_variables['line_item_count'] = $this->model->get_line_item_count();
		$this->template_variables['program_of_study'] = $this->model->get_program_of_study();
		$this->template_variables['reference_number'] = $this->model->get_reference_number();
		$this->template_variables['signature'] = $this->model->get_signature();
		$this->template_variables['signed_date_time'] = $this->model->get_signed_date_time();
		$this->template_variables['signed_field_names'] = $this->model->get_signed_field_names();
		$this->template_variables['transaction_type'] = $this->model->get_transaction_type();
		$this->template_variables['transaction_uuid'] = $this->model->get_transaction_uuid();
		$this->template_variables['unsigned_field_names'] = $this->model->get_unsigned_field_names();
	}
}
