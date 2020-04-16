<?php
class User {
    private $db;
    public function __construct()
    {
        // get access to database
        $this->db = new Database();
    }
    public function verifyEmail($data) {
        $query = "SELECT * FROM users WHERE email = :email";
       return $this->db->query($query)->bind(":email", $data["email"])->getSingle(); 

    } 
    public function verifyPassword($data) {
        $query = "SELECT * FROM users WHERE email = :email";
       $userData = $this->db->query($query)->bind(":email", $data["email"])->getSingle();
       return $userData->password === $data['password'];

    } 
}

?>