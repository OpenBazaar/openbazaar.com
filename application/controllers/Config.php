<?php
class Config extends CI_Controller {

        public function index()
        {
	        	session_start();
	        	
	        	$languages = file_get_contents(asset_url().'js/languages.json');
	        	$languages = json_decode($languages, true);
	        	
	        	$currencies = file_get_contents(asset_url().'js/currencies.json');
	        	$currencies = json_decode($currencies, true);

                $this->load->view('config', array('languages'=>$languages, 'currencies'=>$currencies));
        }
        
        public function save_settings() {
	        
	        session_start();

	        foreach($_POST as $key=>$value) {
		        $_SESSION[$key] = $value;
	        }
        }
               
}