<?php
class Report extends CI_Controller {

        public function index()
        {
	        	
	        	$languages = file_get_contents(asset_url().'js/languages.json');
	        	$languages = json_decode($languages, true);
	        	
	        	$currencies = file_get_contents(asset_url().'js/currencies.json');
	        	$currencies = json_decode($currencies, true);
	        	
	        	$countries = file_get_contents(asset_url().'js/countries.json');
	        	$countries = json_decode($countries, true);
				
				$user_language = ($_COOKIE['language'] != "") ? $_COOKIE['language'] : "";
				$user_country = ($_COOKIE['country'] != "") ? $_COOKIE['country'] : "";
				$user_nsfw = ($_COOKIE['nsfw'] != "") ? $_COOKIE['nsfw'] : "";

				$user_currency = ($_COOKIE['currency'] != "") ? $_COOKIE['currency'] : "USD";
				$user_gateway = ($_COOKIE['gateway'] != "") ? $_COOKIE['gateway'] : "https://gateway.ob1.io";				
				

                $this->load->view('report', array(
                	'languages'=>$languages, 
                	'currencies'=>$currencies, 
                	'countries'=>$countries,
                	'user_language'=>$user_language,
                	'user_nsfw'=>$user_nsfw,
                	'user_country'=>$user_country,
                	'user_currency'=>$user_currency,
                	'user_gateway'=>$user_gateway           
                	)
                );
        }
        
        public function save_settings() {	       

	        foreach($_POST as $key=>$value) {		        
		        setcookie($key, $value, time() + (86400 * 30), "/"); 
	        }
        }
               
}