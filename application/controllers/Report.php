<?php
class Report extends CI_Controller {

        public function index()
        {
            $this->load->view('report');
        }
        
        public function save_settings() {	       

	        foreach($_POST as $key=>$value) {		        
		        setcookie($key, $value, time() + (86400 * 30), "/"); 
	        }
        }
               
}