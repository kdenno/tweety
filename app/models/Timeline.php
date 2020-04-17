<?php
// timelime model
class Timeline {
    public $db;
    public function __construct()
    {
        $this->db = new Database;
        
    }

    public function getUserData($email) {
            $query = "SELECT * FROM users WHERE email = :email";
           return $this->db->query($query)->bind(":email", $email)->getSingle(); 
    
    }
}
?>