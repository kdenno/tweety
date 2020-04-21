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
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "country" => trim($_POST['country']),
                "website" => trim($_POST['website']),
                "bio" => trim($_POST['bio']),
                "country_err" => "",
                "bio_err" => "",
                "profileImg_err" => "",
                "coverImg_err" => ""
            ];
            
            if(empty($data['bio'])){
                $data["bio_err"] = "Your bio is empty";
            }
            if(empty($data['country'])){
                $data["country_err"] = "Please enter country";
            }
            if(empty($data['country_err']) && empty($data['bio_err'])){
                // update profile
                $fields = [
                    "country" => $data['country'],
                    "bio" => $data['bio'],
                    "website" => $data['website']
                ];
                $this->userModel->updateUser('users', $_SESSION['user_id'], $fields);
                redirect('timelines');

            }else {
                $userdata = $this->getUserData($username);
                $data['userdata'] = $userdata;
                reloadView('profileEdit', $data);

            }

        }else {
            // call parent class's profile method;
       $this->profile($username, 'profileEdit');

        }
        
    }
    public function editProfileImages() {
        $username=[];
        array_push($username, $_SESSION['username']);
        $data = [
            "profileImg_err" => "",
            "coverImg_err" => ""
        ];
        if(isset($_FILES['profileImage'])){
            // check if we got image
            if(!empty($_FILES['profileImage']['name'][0])){
                $filename = ($this->uploadImage($_FILES['profileImage'], 'profileImg_err', $data));
                $fields = [
                    "profileImage" => $filename
                ];
                $this->userModel->updateUser('users', $_SESSION['user_id'], $fields);
                $userdata = $this->getUserData($username);
                $data['userdata'] = $userdata;
                reloadView('profileEdit', $data);
    
            }

        }
        if(isset($_FILES['profileCover'])){
            // check if we got image
            if(!empty($_FILES['profileCover']['name'][0])){
                $filename = ($this->uploadImage($_FILES['profileCover'], 'coverImg_err', $data));
                $fields = [
                    "profileCover" => $filename
                ];
                $this->userModel->updateUser('users', $_SESSION['user_id'], $fields);
                $userdata = $this->getUserData($username);
                $data['userdata'] = $userdata;
                reloadView('profileEdit', $data);
            
            }

        }

    }

    public function uploadImage($file, $img_err_type, $data) {
        $filename   = $file['name'];
        $fileTmp    = $file['tmp_name'];
		$fileSize   = $file['size'];
		$error     = $file['error'];
        $ext = explode('.', $filename);
        $ext = strtolower(end($ext)); // use end() to get last element in the array
        $allowed_ext = array('jpg','JPG', 'png', 'jpeg');
        if(in_array($ext, $allowed_ext)) {
            if($error === 0) {
                if($fileSize <= 2097152){
                    $root = 'public/images/' . $filename;
				  	 move_uploaded_file($fileTmp, $_SERVER['DOCUMENT_ROOT'].'/tweety/'.$root);
                    return $filename;
            
                }else {
                    $data[$img_err_type] = "File is too large";
                    return false;
                }
            }

        }else{
            $data[$img_err_type] = "Invalid Image Type";
            return false;
        }

    }
}
