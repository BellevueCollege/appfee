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
 * Form post model class file
 *
 * This file contains the Form_Post_Model class that extends the default
 * model.
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
 * Defines the form post model
 *
 * This class is usually extended but can be used when additional functionality
 * is not needed. It is used to for models that need form post information.
 *
 * @since 1.0.0
 */
class Form_Post_Model extends Default_Model {
	/**
	 * URL that can be used to post the program of study form.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $form_post_url;

	/**
	 * Form post model constructor.
	 *
	 * Populates some class properties from the constructor parameters.
	 *
	 * @since 1.0.0
	 *
	 * @see Default_Model::$template_uri
	 * @see Default_Model::$globals_path
	 * @see Default_Model::$globals_url
	 * @see Form_Post_Model::$form_post_url
	 *
	 * @param string $template_uri          File system path to a HTML template.
	 * @param object $globals_configuration HTML resource configuration object.
	 * @param string $form_post_url         URL that the student name and date
	 *                                      of birth form can be posted to.
	 */
	public function __construct(
		$template_uri,
		$globals_configuration,
		$form_post_url
	) {
		parent::__construct( $template_uri, $globals_configuration );
		$this->set_form_post_url( $form_post_url );
	}

	/**
	 * Get the form post URL property.
	 *
	 * Helper method that returns the form post URL property.
	 *
	 * @since 1.0.0
	 * @see Form_Post_Model::$form_post_url
	 * @return string URL that can be posted to.
	 */
	public function get_form_post_url() {
		return $this->form_post_url;
	}

	/**
	 * Set the form post URL property.
	 *
	 * Helper method that sets the form post URL property.
	 *
	 * @since 1.0.0
	 * @see Form_Post_Model::$form_post_url
	 * @param string $form_post_url URL that can be posted to.
	 */
	public function set_form_post_url( $form_post_url ) {
		$this->form_post_url = $form_post_url;
	}
}
