<?php

include_once "business_logic/productsStuff.php";
include_once "business_logic/newsStuff.php";

class Items extends CI_Controller {
    public function item($id)
	{
//            Exmaple of using products stuff
//            $productsStuff = new ProductsStuff();
//            $productsStuff->getProducts(NULL, -1, 0, 100);
            
//            Example of using news stuff
//            $newsStuff = new NewsStuff();
//            $newsStuff->getNews(NULL, 0, 100);
            session_start();
            $this->load->view('main_top'); 
            
            $data['id']=$id;
            $this->load->view('one_item',$data); 
            $this->load->view('main_footer'); 
       	}
}

?>
