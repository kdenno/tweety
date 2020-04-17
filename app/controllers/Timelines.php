<?php 
class Timelines extends Controller {
    private $useremail;
    public $TModel;
    public function __construct()
    {
        if(!isLoggedIn()) {
            redirect("index");

        }
        $this->useremail = $_SESSION['email'];
        $this->TModel = $this->model('Timeline');
    }

    public function index() {
        // load user's TL
        $userdata = $this->TModel->getUserData($this->useremail);

        $data = [
            "userdata" => $userdata
        ];
        
    
        $this->loadView("timeline", $data);
    }
}
?>