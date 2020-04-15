<?php
class User {
    private $db;
    public function __construct()
    {
        // get access to database
        $this->db = new Database();
    }
}

?>