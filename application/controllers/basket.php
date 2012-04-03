<?php
    include_once "business_logic/productsStuff.php";
    include_once "business_logic/newsStuff.php";
    include_once "business_logic/basketStuff.php";
    include_once "business_logic/userManager.php";
    include_once "business_logic/mailSender.php";
    
    class Basket extends CI_Controller {
    public function index()
    {
        session_start();
         $data['activeLink']= 5;
         $this->load->view('main_top', $data); 
         $this->load->view('basket');
         $this->load->view('main_footer');
    }
    
    public function makeOrder(){
        session_start();
         $data['activeLink']= 5;
         $this->load->view('main_top', $data); 
         $this->load->view('makingOrder');
         $this->load->view('main_footer');
    }
    
     public function makePay(){
        session_start();
         $data['activeLink']= 5;
         $this->load->view('main_top', $data); 
         $this->load->view('orderInfo');
         $this->load->view('main_footer');
    }
    
    
    public function successPay(){
        session_start();
         $data['activeLink']= -1;
         $this->load->view('main_top', $data); 
         $data['payOk']=1;
         $this->load->view('payment', $data);
         $this->load->view('main_footer');
    }
    public function failPay(){
        session_start();
         $data['activeLink']= -1;
         $this->load->view('main_top', $data); 
         $data['payOk']=0;
         $this->load->view('payment', $data);
         $this->load->view('main_footer');
    }
}
?>
