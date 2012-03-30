<?php

include_once "business_logic/productsStuff.php";
include_once "business_logic/newsStuff.php";
include_once "business_logic/basketStuff.php";

class Items extends CI_Controller {
    public function index()
    {
        session_start();
        $data['activeLink']=2;
        $this->load->view('main_top', $data); 
    
        $productsStuff = new ProductsStuff();
        $stuff = $productsStuff->getProducts(NULL, -1, 0, 100);
        $data['stuff']=$stuff;
        $_SESSION['currentStuff']=$stuff;
        $data['catId']=-1;
        $this->load->view('itemsByCat',$data); 
        $this->load->view('main_footer');         
    }
    
    public function item($id)
	{
            session_start();
            $data['activeLink']=2;
            $this->load->view('main_top', $data); 
            
            $data['id']=$id;
            $this->load->view('one_item',$data); 
            $this->load->view('main_footer'); 
       	}
     
    public function itemsByCat($catId)
    {
        session_start();
       $data['activeLink']=2;
            $this->load->view('main_top', $data); 
        
        $productsStuff = new ProductsStuff();
        $stuff = $productsStuff->getProducts(NULL, $catId, 0, 100);
        $data['stuff']=$stuff;
        
        $_SESSION['currentStuff']=$stuff;
        $data['catId']=$catId;
        $this->load->view('itemsByCat',$data); 
        $this->load->view('main_footer'); 
        
    }
}

?>
