<?php
session_start();
function createSession($data) {
    foreach($data as $key => $value) {
        $_SESSION[$key] = $value;

    }
   
}
function destroySession($data) {
    foreach($data as $key => $value) {
        unset($_SESSION[$key]);
    }
  
}
function isLoggedIn() {
    return $_SESSION['user_id'];
}
?>