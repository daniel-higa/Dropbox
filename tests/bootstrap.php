<?php

/**
 * A bootstrap for the Dropbox SDK unit tests
 * @link https://github.com/BenTheDesigner/Dropbox/tree/master/tests
 */

// Restrict access to the command line
if (PHP_SAPI !== 'cli') {
	exit('setup.php must be run via the command line interface');
}

// Set error reporting
error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('html_errors', 'Off');
session_start();

require_once('../Classes/Dropbox/API.php');
require_once('../Classes/Dropbox/OAuth/Storage/Encrypter.php');
require_once('../Classes/Dropbox/OAuth/Storage/StorageInterface.php');
require_once('../Classes/Dropbox/OAuth/Storage/Session.php');
require_once('../Classes/Dropbox/OAuth/Consumer/ConsumerAbstract.php');
require_once('../Classes/Dropbox/OAuth/Consumer/Curl.php');
require_once('../Classes/Dropbox/Exception/BadRequestException.php');
require_once('../Classes/Dropbox/Exception/CurlException.php');
require_once('../Classes/Dropbox/Exception/NotAcceptableException.php');
require_once('../Classes/Dropbox/Exception/NotFoundException.php');
require_once('../Classes/Dropbox/Exception/NotModifiedException.php');
require_once('../Classes/Dropbox/Exception/UnsupportedMediaTypeException.php');
