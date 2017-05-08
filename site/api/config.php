<?php
/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

error_reporting(E_ALL);
ini_set("display_errors", 1);

$base_dir = dirname(__DIR__)."/".basename(__DIR__);

$configurations = (object)array(
  "apiKey"  => "TestOneTwo",
  "baseDir" => $base_dir
);

// Set your timezone.
define('TIMEZONE','America/New_York');
?>