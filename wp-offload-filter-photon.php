<?php
/*
Plugin Name: WP Offload S3 Filter Photon
Plugin URI: https://github.com/mitcdh/wp-offload-filter-photon
Description: Prevents WP Offload S3 from handling photon supported formats
Author: Mitchell Hewes
Version: 0.0.1
Author URI: https://github.com/mitcdh
*/
// Copyright (c) 2015 Delicious Brains. All rights reserved.
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************

class wp_offload_s3_filter_photon {
	function __construct() {

		add_filter( 'as3cf_allowed_mime_types', array( $this, 'allowed_mime_types' ), 10, 1 );

	}

	function allowed_mime_types( $types ) {
		
		$photon_formats = array('jpg|jpeg|jpe', 'gif', 'png');
		
		foreach($photon_formats as $format) {
		   unset($types[$format]);
		}

		return $types;
	}

}

new wp_offload_s3_filter_photon();
