<?php
class Users extends Controller
{
    public $userModel;
    public function __construct()
    {
        // get access to model
        $this->userModel = $this->model('User');
    }
    public function index()
    {
        // load current user's activity
        $data = [];
        $this->loadView('index', $data);
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "email_err" => "",
                "password_err" => "",
                "signup" => false,
                "signin" => true
            ];

            if (empty($data['email'])) {
                $data["email_err"] = "Please enter email";
            } else {
                // verify email
                $userData = $this->userModel->verifyEmail($data['email']);
                if (!$userData) {
                    $data["email_err"] = "User not found";
                }
            }
            $loggedUser = null;
            if (empty($data['password'])) {
                $data["password_err"] = "Please enter password";
            } else {
                // verify password
                $loggedUser = $this->userModel->verifyPassword($data);

                if (!$loggedUser) {
                    $data["password_err"] = "Wrong Password";
                };
            }
            if (empty($data["email_err"]) && empty($data["password_err"])) {

                // create session
                $this->LoginUser($loggedUser);
            } else {
                $this->loadView("index", $data);
            }
        }
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [
                "screenName" => trim($_POST['screenName']),
                "regemail" => trim($_POST['regemail']),
                "regpassword" => trim($_POST['regpassword']),
                "screenName_err" => "",
                "username" => "",
                "regemail_err" => "",
                "regpass_err" => "",
                "signup" => true,
                "signin" => false
            ];
            if (empty($data['screenName'])) {
                $data["screenName_err"] = "Please enter Name";
            }

            if (empty($data['regemail'])) {
                $data["regemail_err"] = "Please enter email";
            } else {
                // verify email
                $userData = $this->userModel->verifyEmail($data['regemail']);
                if ($userData) {
                    $data["regemail_err"] = "User with email address " . $userData->email . " already exists";
                }
            }
            if (empty($data['regpassword'])) {
                $data["regpass_err"] = "Please enter password";
            }
            if (empty($data["regemail_err"]) && empty($data["screenName_err"]) && empty($data["regpass_err"])) {
                // hash password
                $data['regpassword'] = password_hash($data['regpassword'], PASSWORD_DEFAULT);

                $newUser = $this->userModel->insertUser($data);
                if ($newUser) {
                    $this->LoginUser($newUser, 'register');
                } else {
                    die('Error occured inserting user');
                }
            } else {
                $this->loadView("index", $data);
            }
        }
    }

    public function steps()
    {

        $data = [
            "step" => "1",
            "username_err" => ""
        ];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if (isset($_POST['username'])) {
                if ($this->userModel->verifyUsername(trim($_POST['username']))) {
                    $data["username_err"] = "User name " . $_POST['username'] . " is already taken, please choose another one";
                } else {
                    // update user
                    $userid = getUserIdFromSession();
                    $fields = [
                        "username" => $_POST['username']
                    ];
                    $this->userModel->updateUser('users', $userid, $fields);
                    $data["step"] = "2";
                    $data["username"] = $_POST['username'];
                };
            } else {
                $data['username_err'] = "Enter Username";
            }
            $this->loadView('signupsteps', $data);
        } else {

            $this->loadView('signupsteps', $data);
        }
    }

    public function profile($username = null, $page="profile") {
        if(!isLoggedIn()){
            redirect("index");

        }
        if($username) {
            $userData = $this->userModel->verifyUsername($username[0]);
            $data=["userdata" => $userData];
            $this->loadView($page, $data);

        }else{
            // display current user's profile

        }

    }
    public function getUserData($username) {
       return $this->userModel->verifyUsername($username[0]);
    }
  
    public function following($username = null) {
        if(!isLoggedIn()){
            redirect("index");

        }
        if($username) {
            $userData = $this->userModel->verifyUsername($username[0]);
            $data=["userdata" => $userData];
            $this->loadView("following", $data);

        }else{
            // display current user's profile

        }

    }

    public function followers($username = null) {
        if(!isLoggedIn()){
            redirect("index");

        }
        if($username) {
            $userData = $this->userModel->verifyUsername($username[0]);
            $data=["userdata" => $userData];
            $this->loadView("followers", $data);

        }else{
            // display current user's profile

        }

    }

    public function logout()
    {
        destroySession();
        redirect("index");
    }
    public function LoginUser($user, $mode = 'login')
    {
        $data = [
            "user_id" => $user->user_id,
            "username" => $user->username,
            "email" => $user->email
        ];
        createSession($data);
        if ($mode == 'login') {
            redirect('timelines');
        } else {
            $this->loadView('signupsteps', ["step" => '1']);
        }
    }
}
