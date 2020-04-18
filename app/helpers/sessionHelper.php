<?php
session_start();
function createSession($data) {
    foreach($data as $key => $value) {
        $_SESSION[$key] = $value;

    }
   
}
function destroySession() {
        session_destroy(); 
        return true;
}
function isLoggedIn() {
    return $_SESSION['user_id'];
}
function getUserIdFromSession() {
    return $_SESSION['user_id'];
}
?>