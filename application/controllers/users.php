<?php

include_once "business_logic/userManager.php";
include_once "business_logic/basketStuff.php";

class Users extends CI_Controller {
    public function login(){
        session_start();
        $data['activeLink']=4;
        $this->load->view('main_top', $data); 
        $this->load->view('login_page'); 
        $this->load->view('main_footer');         
    }
    
    public function unlogin(){
        session_start();
        $_SESSION['hasLogined']=false;
        $_SESSION['basketStuff']->setUserInfo(NULL);
        $_SESSION['basketStuff']->clear();
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
    
    public function register(){
        session_start();
        $data['activeLink']=4;
        $this->load->view('main_top', $data); 
        $this->load->view('reg_page'); 
        $this->load->view('main_footer');       
    }
    
}
?>
