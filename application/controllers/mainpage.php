<?php

include_once "business_logic/productsStuff.php";

class Mainpage extends CI_Controller {
    public function index()
	{
//         Exmaple of using products stuff
//            $productsStuff = new ProductsStuff();
//            $productsStuff->getProducts(NULL, -1, 0, 100);
            
            
            $this->load->view('main_top'); 
            /* $pr = Products.GetProducts("",0,1,12);*/
            $pr[0]="/images/items/Bravo-07_prev.png";
            $pr[1]="/images/items/Dynamite-03_prev.png";
            $pr[2]="/images/items/stomp-101_prev.png";
            $pr[3]="/images/items/Bravo-07_prev.png";
            $pr[4]="/images/items/Dynamite-03_prev.png";
            $pr[5]="/images/items/stomp-101_prev.png";
            $pr[6]="/images/items/Bravo-07_prev.png";
            $pr[7]="/images/items/Dynamite-03_prev.png";
            $pr[8]="/images/items/stomp-101_prev.png";

            $data['pr']=$pr;

            $this->load->view('scroll',$data); 
            $this->load->view('main_footer'); 
       	}
}

?>
