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
 * Default model class file
 *
 * This file contains the Default_Model class.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage Model
 * @since 1.0.0
 */

/**
 * Default model class defines the basic application model
 *
 * This class is usually extended but can be used when additional functionality
 * is not needed. It is used to store the bare minimum information needed to
 * implement a model within the application.
 *
 * @since 1.0.0
 */
class Default_Model {

	/**
	 * Stores error messages recorded by an controller.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string[]
	 */
	protected $errors;

	/**
	 * A URL that may be used for an HTTP redirect.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $redirect_url;

	/**
	 * File system path to the globals library.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $globals_path;

	/**
	 * URL that the globals library can be referenced from.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $globals_url;

	/**
	 * File system path to a HTML template file to be used by an view.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $template_uri;

	/**
	 * Default model constructor.
	 *
	 * Populates some class properties from the constructor parameters.
	 *
	 * @since 1.0.0
	 *
	 * @see Default_Model::$template_uri
	 * @see Default_Model::$globals_path
	 * @see Default_Model::$globals_url
	 *
	 * @param string $template_uri          File system path to a HTML template.
	 * @param object $globals_configuration HTML resource configuration object.
	 */
	public function __construct( $template_uri,
		$globals_configuration = null,
                $database_configuration
	) {
		$this->template_uri = $template_uri;
		if ( isset( $globals_configuration ) ) {
			$this->globals_path = $globals_configuration->get_path();
			$this->globals_url = $globals_configuration->get_url();
		}
		$this->errors = array();
                $this->database_connection = new PDO(
			$database_configuration->get_data_source_name(),
			$database_configuration->get_username(),
			$database_configuration->get_password()
		);
	}
/**
         * Get Active Year Quarters
         **/
        public function get_active_year_quarters()
        {
            try{
			$active_yrq_sql = " EXEC usp_getYearQuarterforAdmission; ";  //" EXEC usp_getActiveYearQuarter; "; Name of stored procedure changed 4/3/2017
			$query = $this->database_connection->prepare($active_yrq_sql); 
			$query->execute();			
			$active_yrq_options = $query->fetchAll(PDO::FETCH_ASSOC);
                        //var_dump($active_yrq_options);
                        if(!empty($active_yrq_options))
                        { 
                            for($i=0;$i<count($active_yrq_options);$i++)
                            {
                                $yrq_id = $active_yrq_options[$i]['YearQuarterID'];
                                $yrq_title = $active_yrq_options[$i]['Title'];
                                $explode_title = explode(' ',$yrq_title);
                                $quarter = '';
                                switch($explode_title[0])
                                {
                                        case 'Spr':
                                                $quarter = 'Spring';
                                                break;
                                        case 'Sum':
                                                $quarter = 'Summer';
                                                break;
                                        case 'Win':
                                                $quarter = 'Winter';
                                                break;
                                        case 'Fall':
                                                $quarter = 'Fall';
                                                break;
                                }
                                $quarter_title = $quarter. ' '.$explode_title[1];
                                $active_yrq_options[$i]['Title'] = $quarter_title;
                            }
                        }
			return $active_yrq_options;
		}catch(PDOException $e)
		{
			echo 'ERROR: ' . $e->getMessage();
		}
		return null;
        }
	/**
	 * Add error messages to the errors property.
	 *
	 * Called by a controller to add error messages to the model.
	 *
	 * @since 1.0.0
	 * @see Default_Model::$errors
	 * @param string $error_message The message to be added to the errors
	 *                              property.
	 */
	public function add_error( $error_message ) {
		$this->errors[] = $error_message;
	}

	/**
	 * Construct and return the currently requested application URL.
	 *
	 * Creates a string that represents the currently requested URL and returns
	 * it.
	 *
	 * @since 1.0.0
	 * @return string Current URL requested from the application.
	 */
	public function get_current_url() {
		$request_scheme = ( isset( $_SERVER['HTTPS'] ) ) ? 'https' : 'http';
		$current_url = $request_scheme
			. '://'
			. $_SERVER['HTTP_HOST']
			. $_SERVER['REQUEST_URI']
		;
		return $current_url;
	}

	/**
	 * Return the error messages array property.
	 *
	 * Returns error messages recorded to the model's errors array property.
	 *
	 * @since 1.0.0
	 * @see Default_Model::$errors
	 * @return string[] Error messages recorded to the model.
	 */
	public function get_errors() {
		return $this->errors;
	}

	/**
	 * Return the globals file system path.
	 *
	 * Returns the globals file system path from the model's globals path
	 * property.
	 *
	 * @since 1.0.0
	 * @see Default_Model::$globals_path
	 * @return string Globals file system path.
	 */
	public function get_globals_path() {
		return $this->globals_path;
	}

	/**
	 * Return the globals URL reference path.
	 *
	 * Returns the globals URL reference path from the model's globals URL
	 * property.
	 *
	 * @since 1.0.0
	 * @see Default_Model::$globals_url
	 * @return string Globals URL reference path.
	 */
	public function get_globals_url() {
		return $this->globals_url;
	}

	/**
	 * Return the redirect URL property.
	 *
	 * Returns the redirect URL reference path from the model's redirect URL
	 * property.
	 *
	 * @since 1.0.0
	 * @see Default_Model::$redirect_url
	 * @return string A URL that can be redirected to.
	 */
	public function get_redirect_url() {
		return $this->redirect_url;
	}

	/**
	 * Return the HTML template file system path.
	 *
	 * Returns the HTML template file system path to be used by a view.
	 *
	 * @since 1.0.0
	 * @see Default_Model::$template_uri
	 * @return string File system path to a HTML template.
	 */
	public function get_template_uri() {
		return $this->template_uri;
	}

	/**
	 * Set the redirect URL property.
	 *
	 * Helper method that sets the redirect URL property.
	 *
	 * @since 1.0.0
	 * @see Default_Model::$redirect_url
	 * @param string $url Redirect URL to be used.
	 */
	public function set_redirect_url( $url ) {
		$this->redirect_url = $url;
	}

	/**
	 * Set the template file system path.
	 *
	 * Helper method that sets the template URI property.
	 *
	 * @since 1.0.0
	 * @see Default_Model::$template_uri
	 * @param string $uri Template URI to be used.
	 */
	public function set_template_uri( $uri ) {
		$this->template_uri = $uri;
	}
}
