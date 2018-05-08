<?php
class Discover extends CI_Controller {

        public function index()
        {
	        	$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	        	$search_string = SEARCH_ENGINE_URI . "/search/listings?q=*&network=mainnet&p=0&ps=66&moderators=all_listings&sortBy=rating&nsfw=false&acceptedCurrencies=BTC";
	        	
	        	$search_hash = hash('ripemd160', $search_string);
	        	$search_load = $this->cache->get('search_'.$search_hash);
	        	if($search_load == "") {
		        	$search_load = file_get_contents($search_string);	
		        	$this->cache->file->save('search_'.$search_hash, $search_load, 900); // 15 minutes cache
	        	}
	        	
	        	$search_results_json = json_decode($search_load);
	        	
/*
	        	$search_load = file_get_contents(SEARCH_ENGINE_URI . "/search/listings?q=*&network=mainnet&p=0&ps=66&moderators=all_listings&sortBy=rating&nsfw=false&acceptedCurrencies=BTC");
				$search_results_json = json_decode($search_load);
*/
				
				$results = $search_results_json->results->results;
				$result_count = $search_results_json->results->total;
				
				$page = 0;
				$page_count = ceil($result_count / 66);
				
				$pagination_url = "/discover/p";
				
				// Get Verified Mods
				$verified_mods = json_decode(file_get_contents(SEARCH_ENGINE_URI . "/verified_moderators"));
				
				$countries = file_get_contents(asset_url().'js/countries.json');
	        	$countries = json_decode($countries, true);
				
				
				$data = array('listings' => $results, 'total' => $result_count, 'q'=> '', 'page'=>$page, 'page_count'=>$page_count, 'pagination_url'=>$pagination_url, 'verified_mods'=>$verified_mods->moderators, 'countries'=>$countries);
				
				foreach($results as $listing) {
					//print_r($listing->data->thumbnail->small);
				}
				
				$this->load->view('header', array('body_class' => 'search'));
                $this->load->view('discover', $data);
                $this->load->view('footer');
        }
        
        public function categories()
        {
	        	
	        	$categories = array('books', 'art', 'clothing', 'bitcoin', 'crypto', 'handmade', 'health', 'toys', 'electronics', 'games', 'music');
	        	$search_results = array();
	        
	        	$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	        		        	
	        	foreach($categories as $category) {
	        		$search_string = SEARCH_ENGINE_URI . "/listings/random?q=$category&size=8";
		        	$search_hash = hash('ripemd160', $search_string);
		        	$search_load = $this->cache->get('search_'.$search_hash);
		        	if($search_load == "") {
			        	$search_load = file_get_contents($search_string);	
			        	$this->cache->file->save('search_'.$search_hash, $search_load, 3600); // 60 minutes cache
		        	}
		        	
		        	$search_results[$category] = json_decode($search_load)->results->results;
		        	shuffle($search_results[$category]);
	        	}
	        		        					
				// Get Verified Mods
				$verified_mods = json_decode(file_get_contents(SEARCH_ENGINE_URI . "/verified_moderators"));
				
				$countries = file_get_contents(asset_url().'js/countries.json');
	        	$countries = json_decode($countries, true);
								
				$data = array('categories'=>$categories, 'search_results' => $search_results,  'verified_mods'=>$verified_mods->moderators, 'countries'=>$countries);

				
				$this->load->view('header', array('body_class' => 'discover'));
                $this->load->view('discover_categories', $data);
                $this->load->view('footer');
        }
        
        public function results($page=0)
        {				
			$decoded_term = isset($_GET['q']) ? $_GET['q'] : "";	
			parse_str($_SERVER['QUERY_STRING'], $query_string);
			
			if(!isset($query_string['q']) || $query_string['q'] == "") {
				$query_string['q'] = "*";
				$q = "";
			} else {
				$q = urlencode($decoded_term);	
			}
			
			$new_query_string = http_build_query($query_string);
					        
	        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

			$search_string = SEARCH_ENGINE_URI . "/search/listings?".$new_query_string;

        	$search_hash = hash('ripemd160', $search_string);
        	$search_load = $this->cache->get('search_'.$search_hash);
        	if($search_load == "") {
	        	$search_load = file_get_contents($search_string);	
	        	$this->cache->file->save('search_'.$search_hash, $search_load, 900); // 15 minutes cache
        	}

			$search_results_json = json_decode($search_load);
			$search_options = $search_results_json->options;
			$search_sorts = $search_results_json->sortBy;
			
			$results = $search_results_json->results->results;
			$result_count = $search_results_json->results->total;
			
			
			$page_count = ceil($result_count / 66);
			
			$pagination_url = "/results/";
			
			// Get Verified Mods
			$verified_mods = json_decode(file_get_contents(SEARCH_ENGINE_URI . "/verified_moderators"));
			
			$countries = file_get_contents(asset_url().'js/countries.json');
	        $countries = json_decode($countries, true);	    
				
// 			$data = array('shipping'=>$shipping, 'condition'=>$condition, 'type'=>$type, 'accepted_currencies'=>$acceptedCurrencies, 'search_options'=>$search_options, 'search_sorts'=>$search_sorts, 'listings' => $results, 'total' => $result_count, 'q' => $decoded_term, 'page'=>$page, 'page_count'=>$page_count, 'pagination_url'=>$pagination_url, 'verified_mods'=>$verified_mods->moderators, 'countries'=>$countries);
			$data = array('search_options'=>$search_options, 'search_sorts'=>$search_sorts, 'listings' => $results, 'total' => $result_count, 'q' => $decoded_term, 'page'=>$page, 'page_count'=>$page_count, 'pagination_url'=>$pagination_url, 'verified_mods'=>$verified_mods->moderators, 'countries'=>$countries, 'query_string'=>$query_string);


	        $this->load->view('header', array('page_title'=>$decoded_term.' - ', 'body_class' => 'search'));
	        $this->load->view('discover', $data);
                $this->load->view('footer');	        
        }
        
        public function p($page=0)
        {
	        	$acceptedCurrencies = (isset($_GET['acceptedCurrencies'])) ? $_GET['acceptedCurrencies'] : "BTC";
	        	$search_load = file_get_contents(SEARCH_ENGINE_URI . "/search/listings?q=*&network=mainnet&p=".$page."&ps=66&moderators=all_listings&nsfw=false&acceptedCurrencies=BTC");
				$search_results_json = json_decode($search_load);
				
				$results = $search_results_json->results->results;
				$result_count = $search_results_json->results->total;
				
				$page_count = ceil($result_count / 66);
				
				$pagination_url = "/discover/p";
				
				// Get Verified Mods
				$verified_mods = json_decode(file_get_contents(SEARCH_ENGINE_URI . "/verified_moderators"));
				
				$countries = file_get_contents(asset_url().'js/countries.json');
	        	$countries = json_decode($countries, true);
				
				$data = array('accepted_currencies'=>$acceptedCurrencies, 'listings' => $results, 'total' => $result_count, 'q'=> '', 'page'=>$page, 'page_count'=>$page_count, 'pagination_url'=>$pagination_url, 'verified_mods'=>$verified_mods->moderators, 'countries'=>$countries);				
				
				$this->load->view('header', array('body_class' => 'listings'));
                $this->load->view('discover', $data);
                                $this->load->view('footer');
        }

        // when someone visits OpenBazaar.com/trade redirect to the cryptocurrency listings 
        public function trade(){
        	redirect('discover/results/?type=cryptocurrency', 'refresh');
        }

        // when someone visits OpenBazaar.com/trade/[coin] redirect to [coin] cryptocurrency listings 
        public function cryptocurrency($coin){
        	redirect('discover/results/?type=cryptocurrency&b0_coinType='. $coin .'', 'refresh');
        }
}