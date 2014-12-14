<?php
session_start();  //start session

require_once('config/config.php');  //include configuration

require_once('helpers/system_helper.php');  //include helper
require_once('helpers/format_helper.php');
require_once('helpers/db_helper.php');

//autoload classes
function __autoload($class_name){
	require_once('libraries/'.$class_name.'.php');
}

?>