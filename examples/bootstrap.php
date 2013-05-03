<?php

/**
 * A bootstrap for the Dropbox SDK usage examples
* @link https://github.com/BenTheDesigner/Dropbox/tree/master/examples
*/

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

// Prevent access via command line interface
if (PHP_SAPI === 'cli') {
    exit('bootstrap.php must not be run via the command line interface');
}

// Don't allow direct access to the bootstrap
if(basename($_SERVER['REQUEST_URI']) == 'bootstrap.php'){
    exit('bootstrap.php does nothing on its own. Please see the examples provided');
}

// Set error reporting
error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');


// Set your consumer key, secret and callback URL
$key    = 'XXXXXXXXXXXXXXX';
$secret = 'XXXXXXXXXXXXXXX';

// Check whether to use HTTPS and set the callback URL
$protocol = (!empty($_SERVER['HTTPS'])) ? 'https' : 'http';
$callback = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Instantiate the Encrypter and storage objects
$encrypter = new Dropbox_OAuth_Storage_Encrypter('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');

// User ID assigned by your auth system (used by persistent storage handlers)
$userID = 1;

// Instantiate the database data store and connect
$storage = new Dropbox_OAuth_Storage_Session($encrypter, $userID);
$storage->connect('localhost', 'dropbox', 'dropbox', 'xxxxxxxxxx', 3306);

// Create the consumer and API objects
$OAuth = new Dropbox_OAuth_Consumer_Curl($key, $secret, $storage, $callback);
$dropbox = new Dropbox_API($OAuth);
