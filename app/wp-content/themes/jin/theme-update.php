<?php
/**
 * Name: ATPU_Theme
 * Description:
 * Version: 1.0.2
 * Author: Takashi Kitajima
 * Author URI: https://2inc.org
 * Created : February 18, 2014
 * Modified: July 29, 2014
 * Package: MW Automatic Theme Plugin Update
 *
 * Original Author: jeremyclark13, Kaspars Dambis (kaspars@konstruktors.com)
 * https://github.com/jeremyclark13/automatic-theme-plugin-update
 *
 * License: GPLv2
 *
 * Copyright 2014 Takashi Kitajima (email : inc@2inc.org)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
class ATPU_Theme {
	private $api_url;
	private $theme_data;
	private $theme_version;
	private $theme_base;

	public function __construct( $api_url = '', $parent_or_child = 'parent' ) {
		if ( !$api_url ) {
			die( 'Please set $api_url.' );
		}
		$this->api_url = esc_url( $api_url );

		switch ( $parent_or_child ) {
			case 'parent' :
				$theme = get_option( 'template' );
				$directory = get_template_directory();
				break;
			case 'child' :
				$theme = get_option( 'stylesheet' );
				$directory = get_stylesheet_directory();
				break;
			default :
				die( '$parent_or_child is invalid.' );
		}
		if ( function_exists( 'wp_get_theme' ) ) {
			$this->theme_data = wp_get_theme( $theme );
			$this->theme_version = $this->theme_data->Version;
		} else {
			$this->theme_data = get_theme_data( $directory . '/style.css' );
			$this->theme_version = $this->theme_data['Version'];
		}
		$this->theme_base = $theme;

		add_filter( 'pre_set_site_transient_update_themes', array( $this, 'check_for_update' ) );
		add_filter( 'themes_api', array( $this, 'theme_api_call' ), 10, 3 );

		if ( is_admin() ) {
			$current = get_transient( 'update_themes' );
		}
	}

	public function check_for_update( $checked_data ) {
		global $wp_version;

		$request = array(
			'slug' => $this->theme_base,
			'version' => $this->theme_version,
		);

		$args = array(
			'body' => array(
				'action' => 'theme_update',
				'request' => serialize( $request ),
				'api-key' => md5( home_url() ),
			),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . home_url()
		);
		$raw_response = wp_remote_post( $this->api_url, $args );
		if ( !is_wp_error( $raw_response ) && $raw_response['response']['code'] == 200 && is_serialized( $raw_response['body'] ) ) {
			$response = unserialize( $raw_response['body'] );
		}

		if ( !empty( $response ) ) {
			$checked_data->response[$this->theme_base] = $response;
		} else {
			unset( $checked_data->response[$this->theme_base] );
		}

		return $checked_data;
	}

	public function theme_api_call( $def, $action, $args ) {
		if ( $args->slug != $this->theme_base )
			return false;

		$args->version = $this->theme_version;
		$request_string = prepare_request( $action, $args );
		$request = wp_remote_post( $this->api_url, $request_string );

		if ( is_wp_error( $request ) ) {
			$error_message = __( 'An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>' );
			$res = new WP_Error( 'themes_api_failed', $error_message, $request->get_error_message() );
		} else {
			$res = unserialize( $request['body'] );
			if ( $res === false ) {
				$res = new WP_Error( 'themes_api_failed', __( 'An unknown error occurred' ), $request['body'] );
			}
		}

		return $res;
	}
}
