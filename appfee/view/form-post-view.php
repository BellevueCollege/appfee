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
 * Form post view class file
 *
 * This file contains the Form_Post_View class that extends the default
 * view.
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
require_once( 'default-view.php' );

/**
 * Defines the form post view
 *
 * This class is usually extended but can be used when additional functionality
 * is not needed. It is used to for views that need form post information.
 *
 * @since 1.0.0
 */
class Form_Post_View extends Default_View {

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
		$this->template_variables['form_post_url'] =
			$this->model->get_form_post_url()
		;
	}
}
