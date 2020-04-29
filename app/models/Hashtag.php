<?php
require_once $_SERVER['DOCUMENT_ROOT']."/tweety/app/config/config.php";
require_once $_SERVER['DOCUMENT_ROOT']."/tweety/app/libraries/Database.php";

function getHashtag($searchTerm)
{
    $dbInst = new Database;
    $query = "SELECT `user_id`, `username`, `screenName`, `profileImage`, `profileCover` FROM `users`  WHERE `username` LIKE ? OR `screenName` LIKE ? ";
    return $dbInst->query($query)->bind(1, $searchTerm . '%')->bind(2, $searchTerm . '%')->resultSet();
}
