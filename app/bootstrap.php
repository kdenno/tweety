<?php
// load constants
require_once "config/config.php";
// load helpers
require_once "helpers/headerFooter.php";

 // Auto Load Libraries
 spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
   })

?>