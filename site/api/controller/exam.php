<?php
/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

class Exam extends Controller {

	// Index is the default function for this controller
	public function index($arg1 = null,$arg2 = null,$arg3 = null){
		$this->test($arg1,$arg2,$arg3);
	}

	public function test($arg1 = null,$arg2 = null,$arg3 = null){

		// Needs both API key and member key for access.
		if ($this->api_key && $this->api_member_has_key) {
			// Load the necessary Model
			$ex = $this->loadModel('ExamManagement');
			// Execute necessary methods
			$return = $ex->init($arg1,$arg2,$arg3);
		} else {
			$return = array('success' => false,'statusMessage' => 'Access denied.');
		}

		// Print json return
		echo json_encode($return);
	}

	public function hello(){

		// Only needs API key for access.
		if ($this->api_key) {
			// Load the necessary Model
			$ex = $this->loadModel('ExamManagement');
			// Execute necessary methods
			$return = $ex->process('Hello World!');
		} else {
			$return = array('success' => false,'statusMessage' => 'Access denied.');
		}

		// Print json return
		echo json_encode($return);
	}

	public function world(){

		// This is a completely unsecured method
		// Load the necessary Model
		$ex = $this->loadModel('ExamManagement');
		// Execute necessary methods
		$return = $ex->process('No Key Needed!');

		// Print json return
		echo json_encode($return);
	}
}
