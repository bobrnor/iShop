<?php

include_once "business_logic/productsStuff.php";
include_once "business_logic/newsStuff.php";

class Mainpage extends CI_Controller {
    public function index()
	{
//            Exmaple of using products stuff
//            $productsStuff = new ProductsStuff();
//            $productsStuff->getProducts(NULL, -1, 0, 100);
            
//            Example of using news stuff
//            $newsStuff = new NewsStuff();
//            $newsStuff->getNews(NULL, 0, 100);
        
        
            $this->load->view('main_top'); 
            $productsStuff = new ProductsStuff();
            $stuff = $productsStuff->getProducts(NULL, -1, 0, 100);
            $data['stuff']=$stuff;
            session_start();
            $_SESSION['currentStuff']=$stuff;
            $this->load->view('scroll',$data); 
            $this->load->view('main_footer'); 
       	}
}

?>
