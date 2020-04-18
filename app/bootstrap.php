<?php
// load constants
require_once "config/config.php";
// load helpers
require_once "helpers/headerFooter.php";
require_once "helpers/sessionHelper.php";
require_once "helpers/redirect.php";

 // Auto Load Libraries
 spl_autoload_register(function($className){
    require_once APPROOT.'/libraries/'.$className.'.php';
   })

?>