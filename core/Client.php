<?php namespace ContentfulManagement;

class Client {
	/**
	 * @var array
	 */
	protected static $clients = array ();
	/**
	 * @var Client
	 */
	protected static $active_client;
	
	/**
	 * @param string $access_token
	 * @return Client
	 */
	public static function get ($access_token) {
		if (!isset (self::$clients[$access_token])) {
			self::$clients[$access_token] = new self ($access_token);
		}
		
		self::$active_client = self::$clients[$access_token];
		return self::$active_client;
	}
	/**
	 * @return Client
	 */
	public static function active_client () {
		return self::$active_client;
	}
	
	
	/**
	 * @var string
	 */
	protected $access_token;

	protected function __construct ($access_token) {
		$this->access_token = $access_token;
	}
	public function access_token () {
		return "Bearer {$this->access_token}";
	}
	
	public function getSpaces () {
		$r = Unirest::get ("https://api.contentful.com/spaces");
		
		return $r->body;
	}
	public function getSpace ($id) {
		$r = Unirest::get ("https://api.contentful.com/spaces/{$id}");
		
		return $r->body;
	}
	public function createSpace ($space_name) {
		$r = Unirest::post ("https://api.contentful.com/spaces", array (), array (
			'name' => $space_name
		));
		
		return $r->body;
	}
	public function updateSpace ($id, $fields, $version) {
		$r = Unirest::put ("https://api.contentful.com/spaces/{$id}", array (
			'X-Contentful-Version' => $version
		), $fields);
		
		return $r->body;
	}
	public function deleteSpace ($id) {
		$r = Unirest::delete ("https://api.contentful.com/spaces/{$id}");
		
		return $r->body;
	}
}