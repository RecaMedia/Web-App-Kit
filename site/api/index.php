<?php
/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

// get config for file path
require 'config.php';
require 'access.php';

// set timezone
date_default_timezone_set(TIMEZONE);

// load application class
require $base_dir.'/controller.php';
require 'router.php';

// start the application
$app = new Router();
?>