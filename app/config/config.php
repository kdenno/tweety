<?php
$db_config["db_host"] = "localhost";
$db_config["db_user"] = "root";
$db_config["db_pass"] = "";
$db_config["db_name"] = "tweety";
foreach($db_config as $key=>$value){
    define(strtoupper($key), $value);
}

// app root
define("APPROOT", dirname(dirname(__FILE__)));
define("URLROOT", "http://localhost:8080/tweety");
define("SITENAME", "Tweety");
?>