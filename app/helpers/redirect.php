<?php
function redirect($route) {
    header('location: '. URLROOT.'/'.$route);

}

function reloadView($view, $data = [])
  {
    // check for file 
    if (file_exists(APPROOT.'/views/' . $view . '.php')) {
      require_once(APPROOT.'/views/' . $view . '.php');
    } else {
      die('View does not exist');
    }
  }
