<?php

include_once "business_logic/productsStuff.php";
include_once "business_logic/newsStuff.php";
include_once "business_logic/basketStuff.php";
include_once "business_logic/userManager.php";

class News extends CI_Controller {
    public function index()
    {
         session_start();
         $newsStuff = new NewsStuff();
         $stuff = $newsStuff->getNews(NULL, 0, 100);
         $data['newsStuff']=$stuff;
         $data['activeLink']= 1;
         $this->load->view('main_top', $data); 
         $this->load->view('news',$data);
         $this->load->view('main_footer');
    }
}