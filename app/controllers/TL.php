<?php 
class TL extends Controller {
    public function __construct()
    {
        if(!isLoggedIn()) {
            redirect("index");

        }
    }

    public function index() {
        // load user's TL
        
        $this->loadView("timeline");
    }
}
?>