<?php  
// Use the built-in DIRECTORY_SEPARATOR constant instead of defining your own
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Define the site root (make sure SITE_ROOT is used consistently)
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'xampp' . DS . 'htdocs' . DS . 'phprest');

// Define the INC_PATH
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'includes');

// Define the CORE_PATH
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT . DS . 'core');

// Load the config file first
require_once(INC_PATH . DS . "config.php");

// Core classes
require_once(CORE_PATH . DS . "post.php");
require_once(CORE_PATH . DS . "categories.php");
?>