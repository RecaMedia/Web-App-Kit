<?php
/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

class DB extends SQLite3 {
	function __construct() {
		global $base_dir;
		$this->open($base_dir.'/core.db');
	}
}

class Access {
	public $db = null;
	public $config = null;

	public $api_key = false;
	public $api_member_has_key = false;
	public $api_member_code = false;
	public $api_member_key = null;

	private $keys = null;

	public function __construct(){
		global $configurations;
		$this->config =& $configurations;

		// open db connection, set domain var and login key.
		$this->openDatabaseConnection();

		// Set API access.
		if (!function_exists('apache_request_headers')) {
			$headers = $this->apache_request_headers();
		} else { 
			$headers = apache_request_headers();
		}

		// Kill API if key doesn't match.
		if (isset($headers["api-key"])) {
			if ($headers["api-key"] != $this->config->apiKey) {
				$return = array('success' => false,'statusMessage' => 'Error with API access.');
				$error = json_encode($return);
				die($error);
			} else {
				$this->api_key = true;
			}
		}

		$this->keys = $this->processKeys();

		// Check to see if member key exist.
		if (isset($headers["member-api-key"])) {
			foreach ($this->keys as $this_member_data) {
				if (in_array($headers["member-api-key"], $this_member_data)) {
					$this->api_member_has_key = true;
					$this->api_member_key = $headers["member-api-key"];
					$this->api_member_code = $this_member_data[1];
				}
			}
		}
	}

	/*------------- Private -------------*/
	private function apache_request_headers() {
		$arh = array();
		$rx_http = '/\AHTTP_/';
		foreach($_SERVER as $key => $val) {
			if( preg_match($rx_http, $key) ) {
				$arh_key = preg_replace($rx_http, '', $key);
				$rx_matches = array();
				$rx_matches = explode('_', $arh_key);
				if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
					foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
					$arh_key = implode('-', $rx_matches);
				}
				$arh[$arh_key] = $val;
			}
		}
		return( $arh );
	}

	private function openDatabaseConnection(){
		$this->db = new DB();
	}

	private function processKeys(){
		$encryptedMembers = array();

		$allMembersQuery = $this->db->prepare("SELECT * FROM Users WHERE Confirm=1");
		$result = $allMembersQuery->execute();

		while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
			$encryptedMembers[] = array(base64_encode($row['Email'].":".$row['Password']),$row['Code']);
		}

		$storedKeys = $encryptedMembers;
		
		return json_decode(json_encode($storedKeys));
	}
}
?>