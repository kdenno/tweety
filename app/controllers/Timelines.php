<?php
class Timelines extends Controller
{
    private $userId;
    public $TModel;
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect("index");
        }
        $this->userId = $_SESSION['user_id'];
        $this->TModel = $this->model('Timeline');
    }

    public function index()
    {
        // load user's TL
        $userdata = $this->TModel->getUserData($this->userId);

        $data = [
            "userdata" => $userdata
        ];


        $this->loadView("timeline", $data);
    }
    public function tweet()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $fields = [];
            $data = [
                "tweetimg_err" => "",
                "status_err" => ""
            ];
            if (empty(trim($_POST['status']))) {
                $data['status_err'] = 'Please Enter Tweet';
            }
            if (isset($_FILES['tweetimg'])) {
                // check if we got image
                if (!empty($_FILES['tweetimg']['name'][0])) {
                    $filename = ($this->uploadTweetImage($_FILES['tweetimg'], 'tweetimg_err', $data));
                    if ($filename) {
                        $fields["tweetImage"] = $filename;
                    }
                }
            }
            if (empty($data['tweetimg_err'] && $data['status_err'])) {
                $fields["status"] = trim($_POST['status']);
                $fields["tweetBy"] = $_SESSION['user_id'];
                $fields["postedOn"] = date('Y-m-d H:i:s');

                $this->TModel->saveTweet('tweets', $fields);
                $userdata = $this->TModel->getUserData($this->userId);
                $data['userdata'] = $userdata;
                reloadView('timeline', $data);
            } else {
                $userdata = $this->TModel->getUserData($this->userId);
                $data['userdata'] = $userdata;
                reloadView('timeline', $data);
            }
        }
    }

    public function uploadTweetImage($file, $img_err_type, $data)
    {
        $filename   = $file['name'];
        $fileTmp    = $file['tmp_name'];
        $fileSize   = $file['size'];
        $error     = $file['error'];
        $ext = explode('.', $filename);
        $ext = strtolower(end($ext)); // use end() to get last element in the array
        $allowed_ext = array('jpg', 'JPG', 'png', 'jpeg');
        if (in_array($ext, $allowed_ext)) {
            if ($error === 0) {
                if ($fileSize <= 2097152) {
                    $root = 'public/tweetimages/' . $filename;
                    move_uploaded_file($fileTmp, $_SERVER['DOCUMENT_ROOT'] . '/tweety/' . $root);
                    return $filename;
                } else {
                    $data[$img_err_type] = "File is too large";
                    return false;
                }
            }
        } else {
            $data[$img_err_type] = "Invalid Image Type";
            return false;
        }
    }
}
