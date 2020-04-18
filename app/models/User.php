<?php
class User
{
  private $db;
  private $stmt;
  public function __construct()
  {
    // get access to database
    $this->db = new Database();
  }
  public function verifyEmail($email)
  {
    $query = "SELECT * FROM users WHERE email = :email";
    return $this->db->query($query)->bind(":email", $email)->getSingle();
  }
  public function verifyPassword($data)
  {
    $query = "SELECT * FROM users WHERE email= :email";
    $row = $this->db->query($query)->bind(':email', $data['email'])->getSingle();
    if (password_verify($data['password'], $row->password)) {
      return $row;
    } else {
      return false;
    };
    return $row;
  }
  public function verifyUsername($username) {
    $query = "SELECT * FROM users WHERE username = :username";
    return $this->db->query($query)->bind(":username", $username)->getSingle();

  }

  public function insertUser($data)
  {
    $query = "INSERT INTO users(username, email, password, screenName) VALUES(:username, :email, :password, :screenName)";
    $this->db->query($query)->bind(':username', $data['username'])->bind(':email', $data['regemail'])->bind(':password', $data['regpassword'])->bind(':screenName', $data['screenName'])->execute();
    return $this->verifyEmail($data['regemail']);
  }

  public function updateUser($tablename, $user_id, $data = array())
  {
    $columns = '';
    $i = 1;
    foreach ($data as $key => $value) {
      $columns .= "{$key} = :{$key} ";
      if ($i < count($data)) {
        $columns .= ", ";
      }
      $i++;
    };
    $query = "UPDATE {$tablename} SET {$columns} WHERE user_id = {$user_id}";
    $this->stmt = $this->db->query($query);
    foreach ($data as $key => $value) {
      $this->stmt->bind(':' . $key, $value);
    }
    return $this->stmt->execute();
  }
}
