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
        $query = "SELECT * FROM users WHERE email= :email";
        $row = $this->db->query($query)->bind(':email', $data['email'])->getSingle();
        if (password_verify($data['password'], $row->password)) {
          return $row;
        } else {
          return false;
        };

    } 

    public function insertUser($data)
  {
    $query = 'INSERT INTO users(name, email, password) VALUES(:name, :email, :password)';
    return $this->db->query($query)->bind(':name', $data['name'])->bind(':email', $data['email'])->bind(':password', $data['password'])->execute();
  }

 
}
