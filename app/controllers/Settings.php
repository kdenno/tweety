<?php
// bring the Users class
require_once APPROOT . "/controllers/Users.php";

class Settings extends Users
{
    public $username;
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('index');
        }
        // call parent class constructor
        parent::__construct();
        $this->username = $_SESSION['username'];
    }

    public function account()
    {
        $currentusername = [];
        array_push($currentusername, $this->username);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $data = [
                "email" => trim($_POST['email']),
                "username" => $username,
                "email_err" => "",
                "username_err" => ""
            ];
            // get userdata
            $theusername[] = $username;
            $userData = $this->getUserData($theusername);

            if ($userData->username != $currentusername[0] and !empty($userData)) {
                // the new user name the user is choosing has already been taken
                $data['username_err'] = "Username is already taken";
            }

            if (preg_match("/[^a-zA-Z0-9\!]/", $username)) {
                $data['username_err']  = "Only characters and numbers allowed";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = "Invalid email format";
            }
            if ($userData->email != $email and !empty($this->userModel->verifyEmail($email))) {
                $data['email_err'] = "Email is already in use";
            }
            if (!empty($data['email_err'] && !empty($data['username_err']))) {
                $data['userdata'] = $userData;
                reloadView('accountsettings', $data);
            } else {
                // update user data
                $fields = [
                    "username" => $username,
                    "email" => $email
                ];
                $this->userModel->updateUser('users', $_SESSION['user_id'], $fields);
                $this->LoginUser($userData = $this->getUserData($theusername));
            }
        } else {
            $this->profile($currentusername, 'accountsettings');
        }
    }
}
