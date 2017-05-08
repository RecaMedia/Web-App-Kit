<?php
/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

class Controller{
	public $db = null;
	public $config = null;

	public $api_key = false;
	public $api_member_has_key = false;
	public $api_member_code = false;
	public $api_member_key = null;

	private $base_dir = null;
	private $access = null;

	public function __construct(){
		global $base_dir;
		global $configurations;
		$this->base_dir =& $base_dir;
		$this->config =& $configurations;
		$this->access = new Access();

		$this->db = $this->access->db;

		$this->api_key = $this->access->api_key;
		$this->api_member_has_key = $this->access->api_member_has_key;
		$this->api_member_code = $this->access->api_member_code;
		$this->api_member_key = $this->access->api_member_key;
	}

	/*------------- Basic -------------*/
	public function encrypt($String){
		return base64_encode($String);
	}

	public function decrypt($String){
		return base64_decode($String);
	}

	/*------------- Other -------------*/
	public function loadModel($model_name){
		require $this->base_dir.'/models/' . strtolower($model_name) . '.php';
		// return new model (and pass the database connection to the model)
		return new $model_name($this->db,$this->config);
	}
}