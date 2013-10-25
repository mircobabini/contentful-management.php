<?php namespace ContentfulManagement;

class Unirest extends \Unirest {
	public static function get ($url, $headers = array ()) {
		$_headers = self::_headers ($headers);

		return parent::get ($url, $_headers);
	}
	public static function post ($url, $headers = array (), $body = NULL) {
		$_headers = self::_headers ($headers);
		$_body = self::_body ($body);

		return parent::post ($url, $_headers, $_body);
	}
	public static function delete ($url, $headers = array ()) {
		$_headers = self::_headers ($headers);

		return parent::delete ($url, $_headers);
	}
	public static function put ($url, $headers = array (), $body = NULL) {
		$_headers = self::_headers ($headers);
		$_body = self::_body ($body);

		return parent::put ($url, $_headers, $_body);
	}
	public static function patch ($url, $headers = array (), $body = NULL) {
		$_headers = self::_headers ($headers);
		$_body = self::_body ($body);

		return parent::patch ($url, $_headers, $_body);
	}
	
	/**
	 * @param array $headers
	 * @return array
	 */
	protected static function _headers ($headers) {
		if (!isset ($headers['Content-Type'])) {
			$headers['Content-Type'] = 'application/vnd.contentful.management.v1+json';
		}
		
		if (!isset ($headers['Authorization'])) {
			$access_token = Client::active_client ()->access_token ();
			$headers['Authorization'] = $access_token;
		}
		
		return $headers;
	}
	/**
	 * @param array $body
	 * @return string
	 */
	protected static function _body ($body) {
		if (is_array ($body)) {
			$body = json_encode ($body);
		}
		
		return $body;
	}
}