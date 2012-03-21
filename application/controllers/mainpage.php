<?php

class Mainpage extends CI_Controller {
    public function index()
	{
		$this->load->view('main_top'); 
                $this->load->view('scroll'); 
                $this->load->view('main_footer'); 
       	}
}

?>
