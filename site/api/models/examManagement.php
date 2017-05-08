<?php
/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

class examManagement extends Controller{

	function __construct($db,$config) {
		$this->db = $db;
		$this->config = $config;
	}

	public function init($arg1,$arg2,$arg3) {

		$array = array();

		if ($arg1 != null) {
			$array[] = $arg1;
		}
		if ($arg2 != null) {
			$array[] = $arg2;
		}
		if ($arg3 != null) {
			$array[] = $arg3;
		}

		$allargs = implode(', ', $array);

		return array(
			'success' => true,
			'statusMessage' => 'The following arguments found: '.$allargs
		);
	}

	public function process($arg1) {

		return array(
			'success' => true,
			'statusMessage' => 'Processed argument: '.$arg1
		);
	}
}
