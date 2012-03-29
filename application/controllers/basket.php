<?php
    include_once "business_logic/productsStuff.php";
    include_once "business_logic/newsStuff.php";
    include_once "business_logic/basketStuff.php";
    
    class Basket extends CI_Controller {
    public function index()
    {
        session_start();
         $data['activeLink']= 5;
         $this->load->view('main_top', $data); 
         $this->load->view('basket');
         $this->load->view('main_footer');
    }
}
?>
