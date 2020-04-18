<?php
// bring the Users class
require_once APPROOT."/controllers/Users.php";

class Profiles extends Users {
    public function __construct()
    {
        if(!isLoggedIn()) {
            redirect('index');
        }
        // call parent class
        parent::__construct();
    }
    public function editProfile() {
        $username=[];
        array_push($username, $_SESSION['username']);
        
        // call parent class's profile method;
       $this->profile($username, 'profileEdit');
   
    }
}
?>