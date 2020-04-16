<?php
class Users extends Controller
{
    private $userModel;
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
                "password_err" => ""
            ];

            if (empty($data['email'])) {
                $data["email_err"] = "Please enter email";
            } else {
                // verify email
                $userData = $this->userModel->verifyEmail($data);
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
                "fullname" => trim($_POST['fullname']),
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "name_err" => "",
                "email_err" => "",
                "password_err" => ""
            ];
            if (empty($data['fullname'])) {
                $data["name_err"] = "Please enter Name";
            }

            if (empty($data['email'])) {
                $data["email_err"] = "Please enter email";
            } else {
                // verify email
                $userData = $this->userModel->verifyEmail($data);
                if ($userData) {
                    $data["email_err"] = "User with email address " . $userData->email . " already exists";
                }
            }
            if (empty($data['password'])) {
                $data["password_err"] = "Please enter password";
            }
            if (empty($data["email_err"]) && empty($data["name_err"]) && empty($data["password_err"])) {
                // hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $newUser = $this->userModel->insertUser($data);
                if ($newUser) {
                    $this->LoginUser($newUser);
                }else{
                    die('Error occured inserting user');
                }
            } else {
                $this->loadView("index", $data);
            }
        }
    }

    public function logout($user)
    {
        $data = [
            "user_id" => $user->id,
            "username" => $user->username,
            "email" => $user->email
        ];

        destroySession($data);
        redirect("index");
    }
    public function LoginUser($user)
    {
        $data = [
            "user_id" => $user->user_id,
            "username" => $user->username,
            "email" => $user->email
        ];
        createSession($data);
        redirect('timelines');
    }
}
