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
 * Name and date of birth view class file
 *
 * This file contains the Name_DOB_View class that extends the form post view.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage View
 * @since 1.0.0
 */

/**
 * Load the the form post view class.
 */
require_once( 'form-post-view.php' );

/**
 * Defines the name and date of birth view
 *
 * This class defines the view to be used with displaying name and date of birth
 * information.
 *
 * @since 1.0.0
 */
class Name_DOB_View extends Form_Post_View {

	/**
	 * Set template variables
	 *
	 * Helper method that populates the template variables property.
	 *
	 * @since 1.0.0
	 * @see Default_Model::$template_variables
	 */
	protected function set_template_variables() {
		$this->controller->process_data( $_POST );
		parent::set_template_variables();
		$this->template_variables['student_date_of_birth'] =
			$this->model->get_date_of_birth()
		;
		$this->template_variables['student_first_name'] =
			$this->model->get_first_name()
		;
		$this->template_variables['student_last_name'] =
			$this->model->get_last_name()
		;
		$this->template_variables['student_middle_name'] =
			$this->model->get_middle_name()
		;
                $this->template_variables['student_yrq'] = 
                        $this->model->get_year_quarter_applied_for();
	}
}
