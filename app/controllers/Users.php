<?php
class Users extends Controller {
    private $userModel;
    public function __construct()
    {
        // get access to model
        $this->userModel = $this->model('User');

        
    }
    public function index() {
        // load current user's activity
        $data = [];
        $this->loadView('index', $data);
    }
}
?>